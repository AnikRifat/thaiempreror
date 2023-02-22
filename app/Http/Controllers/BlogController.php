<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Notify;
use App\Blog;
use App\User;
use Session;
use DB;
use Image;
use File;

class BlogController extends Controller
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
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('admins.blog.view_blogs')->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.blog.create_blog');
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
            'details'     => 'required',

            'image'       => 'required|image'

        ));

        //store in the database
        $blog = new Blog;
        $blog->title       = $request->title;
        $blog->sub_title   = $request->sub_title;
        $blog->details     = $request->details;
        $blog->created_by  = $user_id;
        $blog->status      = 1;

        //save image//
        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('images/home/' . $filename);
            Image::make($image)->resize(350, null)->save($location);

            $blog->image = $filename;
        }

        $blog->save();

        //session flashing
        Session::flash('success', 'New blog successfully created!');

        //return to the show page
        return redirect('/admin/create_blog');
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
        $blog = Blog::find($id);
        return view('admins.blog.edit_blog')->withBlog($blog);
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
            'details'     => 'required',
            'status'      => 'max:10',
            'image'       => 'image'

        ));

        //get exists image
        $exist_image = Blog::find($id)->image;

        //update the data to the database
        $blog = Blog::find($id);
        $blog->title       = $request->input('title');
        $blog->sub_title   = $request->input('sub_title');
        $blog->details     = $request->input('details');
        $blog->updated_by  = $user_id;
        $blog->status      = $request->input('status');

        //save image//
        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('images/home/' . $filename);
            Image::make($image)->resize(350, null)->save($location);

            $blog->image = $filename;
        }

        $blog->save();

        //delete exists image
        if ($request->hasFile('image')) {
            $ex_img = 'images/home/' . $exist_image;
            if (File::exists($ex_img)) {
                File::delete($ex_img);
            }
        }

        //set flash data with success message
        Session::flash('success', 'The blog was successfully updated.');

        //redirect with flash data to address
        return redirect('/admin/edit_blog/' . $id);
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
        Blog::find($id)->delete();

        //set flash data with success message
        Session::flash('success', 'The blog was successfully updated.');

        //return to address page.
        return redirect('/admin/view_blogs');
    }
}
