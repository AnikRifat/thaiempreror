<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Workorder;
use App\Billoflading;
use App\Ticket;
use App\Client;
use App\Notify;
use App\User;
use Session;
use DB;
use Image;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getSearch(Request $request)
    {
        $this->validate($request, array(

            'order_number'      => 'max:255',
            'client_name'       => 'max:255',
            'total_weight'      => 'max:255',
            'total_container'   => 'max:255',
            'work_orders_search'   => 'max:255'

        ));

        $work_orders_search = '';

        if ( !empty($request->order_number) ) {
            $work_orders_search = Workorder::where('id', 'LIKE', "%$request->order_number%")->get();
        } else if ( !empty($request->client_name) ) {
            $work_orders_search = Workorder::where('client', 'LIKE', "%$request->client_name%")->get();
        } else if ( !empty($request->total_weight) ) {
            $work_orders_search = Workorder::where('weight', 'LIKE', "%$request->total_weight%")->get();
        } else if ( !empty($request->total_container) ) {
            $work_orders_search = Workorder::where('container', 'LIKE', "%$request->total_container%")->get();
        } else if ( !empty($request->work_orders_search) ) {
            $work_orders_search = Workorder::where('id', 'LIKE', "%$request->work_orders_search%")->orWhere('client', 'LIKE', "%$request->work_orders_search%")->orWhere('weight', 'LIKE', "%$request->work_orders_search%")->orWhere('container', 'LIKE', "%$request->work_orders_search%")->get();
        } else { 
            $work_orders_search = 0;
        }

        
        return view('users.search_result')->withSearch_worders($work_orders_search);
    }

    public function index()
    {
        $workorders = Workorder::orderBy('id', 'DESC')->get();
        return view('users.view_all_work_orders')->withWorkorders($workorders);
    }

    public function recent()
    {
        $work_orders = Workorder::orderBy('id', 'DESC')->get();
        return view('users.index')->withWorkorders($work_orders);
    }

    public function active()
    {
        $work_orders = Workorder::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('users.active_work_orders')->withWorkorders($work_orders);
    }

    public function finished()
    {
        $work_orders = Workorder::where('status', 2)->orderBy('id', 'DESC')->get();
        return view('users.finished_work_orders')->withWorkorders($work_orders);
    }

    public function finish($id)
    {
        $user_id = Auth::user()->id;
        $worder = Workorder::find($id);
        $worder->status = 2;
        $worder->updated_by = $user_id;
        $worder->updator_role = 'user';

        $worder->save();

        //set flash data with success message
        Session::flash('success', 'The work order has been move to finished work order list.');

        //redirect with flash data to posts.show
        return redirect('/active_work_orders');
    }

    public function activate($id)
    {
        $user_id = Auth::user()->id;
        $worder = Workorder::find($id);
        $worder->status = 1;
        $worder->updated_by = $user_id;
        $worder->updator_role = 'user';

        $worder->save();

        //set flash data with success message
        Session::flash('success', 'The work order has been activated.');

        //redirect with flash data to posts.show
        return redirect('/finished_work_orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('users.add_work_order')->withClients($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creator = Auth::user();
        //validate the data
        $this->validate($request, array(

            'client'            => 'required|min:2|max:50',
            'total_weight'      => 'max:255',
            'total_container'   => 'max:255',
            'detail'            => 'max:500'

        ));

        //store in the database
        $worder = new Workorder;
        $worder->client = $request->client;
        $worder->weight = $request->total_weight;
        $worder->container = $request->total_container;
        $worder->details = $request->detail;
        $worder->created_by = $creator->id;
        $worder->creator_role = 'user';
        $worder->status = 1;

        $worder->save();

        $worder_id = Workorder::orderBy('id', 'DESC')->first()->id;

        //session flashing
        //Session::flash('success', 'New work order successfully created!');
        
        //return to the show page
        return redirect('/add_bol/'.$worder_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;
        $worder = Workorder::find($id);
        $bols = Billoflading::where('work_order_id', $id)->get();
        $tickets = Ticket::where('work_order_id', $id)->get();
        return view('users.work_order_detail')->withWorder($worder)->withBols($bols)->withTickets($tickets);
    }

    public function details()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::all();
        $work_order = Workorder::find($id);
        return view('users.edit_work_order')->withWorder($work_order)->withClients($clients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        // validate the data
        $this->validate($request, array(
            'client'            => 'required|max:255',
            'total_weight'      => "max:255",
            'total_container'   => 'max:255',
            'detail'            => 'max:500'
            ));

        //save the data to the database
        $work_order = Workorder::find($id);
        $work_order->client = $request->input('client');
        $work_order->weight = $request->input('total_weight');
        $work_order->container = $request->input('total_container');
        $work_order->details = $request->input('detail');
        $work_order->updated_by = $user_id;
        $work_order->updator_role = 'user';

        $work_order->save();

        //set flash data with success message
        Session::flash('success', 'The work order was successfully updated.');

        //redirect with flash data to posts.show
        return redirect('/work_order/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find tickets of bill of lading and delete
        Ticket::where('work_order_id', $id)->delete();

        //find the container of bill of lading and delete
        Container::where('work_order_id', $id)->delete();

        //find the boladdress of bill of lading and delete
        Boladdress::where('work_order_id', $id)->delete();

        //find bill of lading and delete
        Billoflading::where('work_order_id', $id)->delete();

        //find work order and delete
        Workorder::find($id)->delete();

        //flash the message
        Session::flash('success', 'The work order was successfully deleted.');

        //return to the index page
        return redirect('/view_all_work_orders');
        
    }
}
