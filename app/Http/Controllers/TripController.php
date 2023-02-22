<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Trip;
use App\Notify;
use App\User;
use Session;
use DB;
use Image;

class TripController extends Controller
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
        $trip = Trip::all();
        return view('users.trips')->withTrips($trip);
    }

    public function getMyTrips()
    {
       $id = Auth::user()->id;
        $trip = Trip::get()->where('user_id', $id);
        return view('users.my_trips')->withTrips($trip);
    }

    public function tripConfirm(Request $request)
    {
        $this->validate($request, array(

            'notifier'  => 'required',
            'receiver'  => 'required',
            'trip_id'   => 'required',
            'message'   => 'required'
        ));

        //store in the database
        $notify = new Notify;
        $notify->notifier_id = $request->notifier;
        $notify->receiver_id = $request->receiver;
        $notify->resource_id = $request->trip_id;
        $notify->message = $request->message;

        $notify->save();

        //session flashing
        Session::flash('success', 'Trip booking confirmed!');

        //return to the show page
        return redirect('/trip/'.$request->trip_id);
    }

    public function tripConfirmed($id)
    {
        //get data form notifies table
        $notifies = Notify::find($id);
        $trip = Trip::find($notifies->resource_id);
        $notifiers = User::find($notifies->notifier_id);

        return view('users.trip_confirmed')->withTrip($trip)->withNotifier($notifiers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create_trip');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        //validate the data
        $this->validate($request, array(

            'vehicle'       => 'required|min:2|max:32',
            'start_point'   => 'required|min:2|max:255',
            'end_point'     => 'required|min:2|max:255',
            'people'        => 'required|max:8',
            'start_time'    => 'required|max:50',
            'request_amount'=> 'required|max:8',
            'details'       => 'required|max:500'

        ));

        //store in the database
        $trip = new Trip;
        $trip->vehicle_type = $request->vehicle;
        $trip->start_point = $request->start_point;
        $trip->end_point = $request->end_point;
        $trip->passenger = $request->people;
        $trip->start_time = $request->start_time;
        $trip->request_amount = $request->request_amount;
        $trip->details = $request->details;
        $trip->user_id = $user_id;

        //save image//
     /*   if($trip->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('images/' . $filename);
            Image::make($image)->resize(600, 600)->save($location);

            $trip->image = $filename;
        }
        */
        $trip->save();

        //session flashing
        Session::flash('success', 'New Trip successfully created!');

        //return to the show page
        return redirect('/my.trips');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = Trip::find($id);
        $creator = User::find($trip->user_id);
        return view('users.show_trip')->withTrip($trip)->withCreator($creator);
    }

    public function myTripShow($id)
    {
        $trip = Trip::find($id);
        $creator = User::find($trip->user_id);
        return view('users.my_trip')->withTrip($trip)->withCreator($creator);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
