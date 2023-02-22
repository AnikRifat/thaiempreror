<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Notify;
use App\Address;
use App\User;
use App\Client;
use Session;
use DB;
use Image;

class ClientController extends Controller
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
    public function index()
    {
        $clients = Client::orderBy('id', 'DESC')->get();
        return view('users.view_all_clients')->withClients($clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add_client');
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

            'client'         => 'required|min:2|max:50',
            'address_line_1' => 'max:255',
            'address_line_2' => 'max:255',
            'contact'        => 'max:255',
            'detail'         => 'max:500'

        ));

        //store in the database
        $client               = new Client;
        $client->client       = $request->client;
        $client->contact      = $request->contact;
        $client->addr1        = $request->address_line_1;
        $client->addr2        = $request->address_line_2;
        $client->detail       = $request->detail;
        $client->status       = 1;
        $client->created_by   = $creator->id;
        $client->creator_role = 'user';

        $client->save();

        //session flashing
        Session::flash('success', 'New client successfully created!');
        
        //return to the show page
        return redirect('/add_client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $client = Client::find($id);
        return view('users.edit_client')->withClient($client);
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
        $creator = Auth::user();
        //validate the data
        $this->validate($request, array(

            'client'         => 'required|min:2|max:50',
            'address_line_1' => 'max:255',
            'address_line_2' => 'max:255',
            'contact'        => 'max:255',
            'detail'         => 'max:500'

        ));

        //store in the database
        $client               = Client::find($id);
        $client->client       = $request->client;
        $client->contact      = $request->contact;
        $client->addr1        = $request->address_line_1;
        $client->addr2        = $request->address_line_2;
        $client->detail       = $request->detail;
        $client->status       = 1;
        $client->updated_by   = $creator->id;
        $client->updator_role = 'user';

        $client->save();

        //session flashing
        Session::flash('success', 'New client successfully updated!');
        
        //return to the show page
        return redirect('/client/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        Session::flash('success', 'The client successfully deleted!');
        return redirect('/show_clients');
    }
}