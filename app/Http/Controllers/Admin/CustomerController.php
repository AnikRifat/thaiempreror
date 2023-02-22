<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Notify;
use App\FoodCat;
use App\User;
use App\FoodSubCat;
use App\FoodItem;
use App\Order;
use App\OrderItem;
use Session;
use DB;
use Image;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admins.view_customers')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::guard('admin')->user()->id;
        //validate the data
        $this->validate($request, array(

            'first_name'      => 'required|min:2|max:50',
            'last_name'       => 'max:255',
            'primary_phone'   => 'required|max:255',
            'secondary_phone' => 'max:255',
            'email'           => 'max:255',
            'property_no'     => 'required|max:255',
            'town_name'       => 'required|max:255',
            'post_code'       => 'max:255',
            'note'            => 'max:500'

        ));

        //store in the database
        $user = new User;
        $user->first_name      = $request->first_name;
        $user->last_name       = $request->last_name;
        $user->primary_phone   = $request->primary_phone;
        $user->secondary_phone = $request->secondary_phone;
        $user->email           = $request->email;
        $user->property_no     = $request->property_no;
        $user->town_name       = $request->town_name;
        $user->post_code       = $request->post_code;
        $user->note            = $request->note;
        $user->created_by      = $user_id;

        $user->save();

        $cust_id = User::orderBy('id', "DESC")->first()->id;

        Session::put('_order_type', 'HOME DELIVERY');

        //session flashing
        Session::flash('success', 'New customer successfully created!');
        
        //return to the show page
        return redirect('/admin/create_order/'.$cust_id);
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
        $user = User::find($id);
        return view('admins.edit_customer')->withUser($user);
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
        $user_id = Auth::guard('admin')->user()->id;
        //validate the data
        $this->validate($request, array(

            'first_name'      => 'required|min:2|max:50',
            'last_name'       => 'max:255',
            'primary_phone'   => 'required|max:255',
            'secondary_phone' => 'max:255',
            'email'           => 'max:255',
            'property_no'     => 'required|max:255',
            'town_name'       => 'required|max:255',
            'post_code'       => 'max:255',
            'note'            => 'max:500'

        ));

        //store in the database
        $user = User::find($id);
        $user->first_name      = $request->input('first_name');
        $user->last_name       = $request->input('last_name');
        $user->primary_phone   = $request->input('primary_phone');
        $user->secondary_phone = $request->input('secondary_phone');
        $user->email           = $request->input('email');
        $user->property_no     = $request->input('property_no');
        $user->town_name       = $request->input('town_name');
        $user->post_code       = $request->input('post_code');
        $user->note            = $request->input('note');
        $user->status          = 1;
        $user->updated_by      = $user_id;

        $user->save();

        //session flashing
        Session::flash('success', 'The customer successfully updated!');
        
        //return to the show page
        return redirect('/admin/customer/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find ordered items and delete
        if(count(OrderItem::where('user_id', $id)->get()) > 0) {
            foreach(OrderItem::where('user_id', $id)->get() as $item){
                $item->delete();
            }
        }
        //find order and delete
        if(count(Order::where('user_id', $id)->get()) > 0) {
            foreach(Order::where('user_id', $id)->get() as $order){
                $order->delete();
            }
        }
        //find customer and delete
        User::find($id)->delete();
        
        Session::flash('success', 'The customer successfully deleted!');
        return redirect('/admin/view_customers');
    }

    /* customization functions */
    public function print_address()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admins.print_address')->withUsers($users);
    }
}