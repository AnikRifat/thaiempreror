<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Notify;
use App\Address;
use App\User;
use Session;
use DB;
use Image;

class AddressController extends Controller
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
        $addresses = Address::orderBy('id', 'DESC')->get();
        return view('admins.show_address')->withAddresses($addresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.add_address');
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

            'stop'      => 'required|min:2|max:255',
            'first'     => 'max:255',
            'last'      => 'max:255',
            'address'   => 'max:255',
            'city'      => 'max:255',
            'state'     => 'max:255',
            'zip'       => 'max:255',
            'telephone' => 'max:18'

        ));

        //store in the database
        $addr = new Address;
        $addr->stop = $request->stop;
        $addr->first = $request->first;
        $addr->last = $request->last;
        $addr->address = $request->address;
        $addr->city = $request->city;
        $addr->state = $request->state;
        $addr->zip = $request->zip;
        $addr->contact = $request->telephone;
        $addr->created_by = $user_id;
        $addr->creator_role = 'admin';
        $addr->status = 1;

        $addr->save();

        //session flashing
        Session::flash('success', 'New address successfully created!');

        //return to the show page
        return redirect('/admin/add_address');
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
        $address = Address::find($id);
        return view('admins.edit_address')->withAddress($address);
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
        // validate the data
        $this->validate($request, array(
            'stop'      => 'required|max:255',
            'first'     => "max:255",
            'last'      => 'max:255',
            'address'   => 'max:255',
            'city'      => 'max:255',
            'state'     => 'max:255',
            'zip'       => 'max:255',
            'telephone' => 'max:255'
            ));

        //update the data to the database
        $addr = Address::find($id);
        $addr->stop         = $request->input('stop');
        $addr->first        = $request->input('first');
        $addr->last         = $request->input('last');
        $addr->address      = $request->input('address');
        $addr->city         = $request->input('city');
        $addr->state        = $request->input('state');
        $addr->zip          = $request->input('zip');
        $addr->contact      = $request->input('telephone');
        $addr->updated_by   = $user_id;
        $addr->updator_role = 'admin';

        $addr->save();

        //set flash data with success message
        Session::flash('success', 'The address was successfully updated.');

        //redirect with flash data to address
        return redirect('/admin/address/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find address and delete
        Address::find($id)->delete();

        //set flash data with success message
        Session::flash('success', 'The address was successfully updated.');

        //return to address page.
        return redirect('/admin/show_address');
    }
}