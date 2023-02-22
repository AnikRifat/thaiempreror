<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use Auth;
use Image;
use Session;

class UsersController extends Controller
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
        // Get all users from database
        $users = User::all();
        return view('admins.view_all_users')->withUsers($users);
    }

    public function getAdmins()
    {
        $users = Admin::all();
        return view('admins.view_all_admins')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create_new_user');
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

            'first_name'    => 'required|min:2|max:32',
            'last_name'     => 'required|min:2|max:32',
            'email'         => 'required|unique:users|email|max:50',
            'password'      => 'required|min:8|max:32|confirmed',
            'contact'       => 'max:18',
            'dob'           => 'max:10',
            'job_title'     => 'max:32',
            'user_type'     => 'max:32',
            'profile_image' => 'image'

        ));

        if($request->user_type == 'user') {

            //store in the database
            $create_user = new User;
            $create_user->first_name   = $request->first_name;
            $create_user->last_name    = $request->last_name;
            $create_user->email        = $request->email;
            $create_user->password     = bcrypt($request->password);
            $create_user->contact      = $request->contact;
            $create_user->dob          = $request->dob;
            $create_user->job_title    = $request->job_title;
            $create_user->created_by   = $user_id;
            $create_user->creator_role = 'admin';
            $create_user->status       = 1;

            //save image//
            if($request->hasFile('profile_image')){
                $image    = $request->file('profile_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = ('images/profile/' . $filename);
                Image::make($image)->resize(600, 600)->save($location);

                $create_user->image = $filename;
            }
            $create_user->save();            


        } else if ($request->user_type == 'admin') {
            //store in the database
            $createAdmin = new Admin;
            $createAdmin->first_name   = $request->first_name;
            $createAdmin->last_name    = $request->last_name;
            $createAdmin->email        = $request->email;
            $createAdmin->password     = bcrypt($request->password);
            $createAdmin->contact      = $request->contact;
            $createAdmin->dob          = $request->dob;
            $createAdmin->job_title    = $request->job_title;
            $createAdmin->type         = 'admin';
            $createAdmin->created_by   = $user_id;
            $createAdmin->creator_role = 'admin';

            //save image//
            if($request->hasFile('profile_image')){
                $image    = $request->file('profile_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = ('images/profile/' . $filename);
                Image::make($image)->resize(600, 600)->save($location);

                $createAdmin->image = $filename;
            }
            $createAdmin->save();
        }        

        //session flashing
        Session::flash('success', 'New '.$request->user_type.' successfully created!');

        //return to the show page
        return redirect('/admin/create_new_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Grab user data by id
        $user = User::find($id);
        return view('admins.user_profile')->withProfile($user);
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
        return view('admins.edit_user')->withUser($user);
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

            'first_name'    => 'required|min:2|max:32',
            'last_name'     => 'required|min:2|max:32',
            'contact'       => 'max:18',
            'dob'           => 'max:10',
            'job_title'     => 'max:32',
            'profile_image' => 'image'

        ));

        //save the data to the database
        $update = User::find($id);
        $update->first_name   = $request->input('first_name');
        $update->last_name    = $request->input('last_name');
        $update->contact      = $request->input('contact');
        $update->dob          = $request->input('dob');
        $update->job_title    = $request->input('job_title');
        $update->updated_by   = $user_id;
        $update->updator_role = 'admin';

        //save image//
        if($request->hasFile('profile_image')){
            $image    = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('images/profile/' . $filename);
            Image::make($image)->resize(600, 600)->save($location);

            $update->image = $filename;
        }

        $update->save();

        //set flash data with success message
        Session::flash('success', 'User Information successfully updated.');

        //redirect with flash data to posts.show
        return redirect('/admin/user/'.$id.'/edit');
    }

    public function permitAdmin(Request $request, $id)
    {
        $user_id = Auth::guard('admin')->user()->id;
        $user = User::find($id);

        $admin = new Admin;
        $admin->first_name = $user->first_name;
        $admin->last_name = $user->last_name;
        $admin->email = $user->email;
        $admin->contact = $user->contact;
        $admin->type = 'admin';
        $admin->password = $user->password;
        $admin->dob = $user->dob;
        $admin->job_title = $user->job_title;
        $admin->image = $user->image;
        $admin->created_by = $user_id;
        $admin->creator_role = 'admin';

        $admin->save();

        //set flash data with success message
        Session::flash('success', 'The User permitted as admin.');

        //redirect with flash data to posts.show
        return redirect('/admin/user/'.$id.'/edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the container
        $user = User::find($id);

        //delete the container
        $user->delete();

        //flash the message
        Session::flash('success', 'The user was successfully deleted.');

        //return to the index page
        return redirect('/admin/all_users');
    }
}