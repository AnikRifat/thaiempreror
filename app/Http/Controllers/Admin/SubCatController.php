<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\FoodCat;
use App\FoodSubCat;
use App\Boladdress;
use App\Container;
use App\Ticket;
use App\Client;
use App\Notify;
use App\User;
use Session;
use DB;
use Image;

class SubCatController extends Controller
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
        $subcats = FoodSubCat::orderBy('sub_cat_id', 'ASC')->get();
        return view('admins.view_sub_categories')->withSubcats($subcats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = FoodCat::orderBy('cat_id', 'ASC')->get();
        return view('admins.create_food_sub_category')->withCats($cats);
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

            'cat_id'              => 'required|max:255',
            'sub_cat_id'          => 'max:255',
            'food_sub_cat_name'   => 'required|min:1|max:255',
            'sub_cat_type'        => 'max:255',
            'details'             => 'max:500'

        ));

        //store in the database
        $food_sub_cat = new FoodSubCat;
        $food_sub_cat->cat_id = $request->cat_id;
        $food_sub_cat->sub_cat_id = $request->sub_cat_id;
        $food_sub_cat->sub_cat_name = $request->food_sub_cat_name;
        $food_sub_cat->sub_cat_type = $request->sub_cat_type;
        $food_sub_cat->details = $request->details;
        $food_sub_cat->status = 1;
        $food_sub_cat->created_by = $user_id;

        $food_sub_cat->save();

        //session flashing
        Session::flash('success', 'New Sub-category successfully created!');

        //return to the show page
        return redirect('/admin/create_sub_category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::guard('admin')->user()->id;
        $worder = Workorder::find($id);
        $bols = Billoflading::where('work_order_id', $id)->get();
        $tickets = Ticket::where('work_order_id', $id)->get();
        return view('admins.work_order_detail')->withWorder($worder)->withBols($bols)->withTickets($tickets);
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
        $subcat = FoodSubCat::find($id);
        $cats = FoodCat::orderBy('id', 'DESC')->get();
        return view('admins.edit_sub_category')->withSubcat($subcat)->withCats($cats);
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
            'cat_id'        => 'required|max:255',
            'sub_cat_id'    => "max:255",
            'sub_cat_name'  => 'required|max:255',
            'sub_cat_slug'  => 'max:255',
            'details'       => 'max:500'
            ));

        //save the data to the database
        $subcat = FoodSubCat::find($id);
        $subcat->cat_id       = $request->input('cat_id');
        $subcat->sub_cat_id   = $request->input('sub_cat_id');
        $subcat->sub_cat_name = $request->input('sub_cat_name');
        $subcat->sub_cat_slug = $request->input('sub_cat_slug');
        $subcat->sub_cat_type = $request->input('sub_cat_type');
        $subcat->details      = $request->input('details');
        $subcat->updated_by   = $user_id;

        $subcat->save();

        //set flash data with success message
        Session::flash('success', 'The food sub-category was successfully updated.');

        //redirect with flash data to posts.show
        return redirect('/admin/subcat/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // //find tickets of bill of lading and delete
        // Ticket::where('work_order_id', $id)->delete();

        // //find the container of bill of lading and delete
        // Container::where('work_order_id', $id)->delete();

        // //find the boladdress of bill of lading and delete
        // Boladdress::where('work_order_id', $id)->delete();

        // //find bill of lading and delete
        // Billoflading::where('work_order_id', $id)->delete();

        //find work order and delete
        FoodSubCat::find($id)->delete();

        //flash the message
        Session::flash('success', 'The Sub-category was successfully deleted.');

        //return to the index page
        return redirect('/admin/view_sub_categories');
    }
}
