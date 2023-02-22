<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Image;
use Session;

class ProfileController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('users.profile')->withProfile($profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$profile = Auth::user();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = Auth::user()->id;

        //validate the data        
        $this->validate($request, array(

            'first_name'    => 'required|min:2|max:32',
            'last_name'     => 'required|min:2|max:32',
            'contact'       => 'required|min:10|max:18',
            'dob'           => 'required|min:10|max:10',
            'job_title'     => 'max:50',
            'profile_image' => 'image'

        ));

        //save the data to the database
        $update = User::find($user_id);

        $update->first_name = $request->input('first_name');
        $update->last_name = $request->input('last_name');
        $update->contact = $request->input('contact');
        $update->dob = $request->input('dob');
        $update->job_title = $request->input('job_title');
        $update->updated_by = $user_id;
        $update->updator_role = 'user';

        //save image//
        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('images/profile/' . $filename);
            Image::make($image)->resize(600, 600)->save($location);

            $update->image = $filename;
        }

        $update->save();

        //set flash data with success message
        Session::flash('success', 'Information successfully updated.');

        //redirect with flash data to posts.show
        return redirect('/profile');
    }

    public function changePassword()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('users.change_my_password')->withProfile($user);
    }

    public function updatePassword(Request $request)
    {
        $user_id = Auth::user()->id;
        //validate the data        
        $this->validate($request, array(

            'old_password' => 'required|min:2|max:32',
            'password'     => 'required|min:2|max:32|confirmed'

        ));

        //save the data to the database
        $update = User::find($user_id);
        $update->password     = bcrypt($request->input('password'));
        $update->updated_by   = $user_id;
        $update->updator_role = 'user';

        $update->save();

        //set flash data with success message
        Session::flash('success', 'Password successfully updated.');

        //redirect with flash data to posts.show
        return redirect('/profile');
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
