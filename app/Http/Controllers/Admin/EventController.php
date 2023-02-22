<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Notify;
use App\Event;
use App\User;
use Session;
use DB;
use Image;
use File;

class EventController extends Controller
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
        $events = Event::orderBy('id', 'DESC')->get();
        return view('admins.view_events')->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create_event');
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
            'title'       => 'required|max:255',
            'sub_title'   => 'max:255',
            'details'     => 'required|max:1000',
            'footer_text' => 'max:500',
            'image'       => 'required|image'

        ));

        //store in the database
        $event = new Event;
        $event->title       = $request->title;
        $event->sub_title   = $request->sub_title;
        $event->details     = $request->details;
        $event->footer_text = $request->footer_text;
        $event->created_by  = $user_id;
        $event->status      = 1;

        //save image//
        if($request->hasFile('image')){
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('images/home/' . $filename);
            Image::make($image)->resize(570, 298)->save($location);

            $event->image = $filename;
        }

        $event->save();

        //session flashing
        Session::flash('success', 'New event successfully created!');

        //return to the show page
        return redirect('/admin/create_event');
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
        $event = Event::find($id);
        return view('admins.edit_event')->withEvent($event);
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
            'title'       => 'required|max:255',
            'sub_title'   => 'max:255',
            'details'     => 'required|max:1000',
            'footer_text' => 'max:500',
            'status'      => 'max:10',
            'image'       => 'image'

        ));

        //get exists image
        $exist_image = Event::find($id)->image;

        //update the data to the database
        $event = Event::find($id);
        $event->title       = $request->input('title');
        $event->sub_title   = $request->input('sub_title');
        $event->details     = $request->input('details');
        $event->footer_text = $request->input('footer_text');
        $event->updated_by  = $user_id;
        $event->status      = $request->input('status');

        //save image//
        if($request->hasFile('image')){
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('images/home/' . $filename);
            Image::make($image)->resize(570, 298)->save($location);

            $event->image = $filename;
        }

        $event->save();

        //delete exists image
        if($request->hasFile('image')){
            $ex_img = 'images/home/'.$exist_image;
            if(File::exists($ex_img)){
                File::delete($ex_img);
            }
        }

        //set flash data with success message
        Session::flash('success', 'The event was successfully updated.');

        //redirect with flash data to address
        return redirect('/admin/edit_event/'.$id);
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
        Event::find($id)->delete();

        //set flash data with success message
        Session::flash('success', 'The event was successfully updated.');

        //return to address page.
        return redirect('/admin/view_events');
    }
}