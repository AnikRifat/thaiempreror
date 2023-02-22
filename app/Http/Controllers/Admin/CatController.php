<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Notify;
use App\Billoflading;
use App\FoodCat;
use App\Workorder;
use App\Boladdress;
use App\Address;
use App\Ticket;
use App\User;
use Session;
use DB;
use Image;

class CatController extends Controller
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
        $food_cats = FoodCat::orderBy('cat_id', 'ASC')->get();
        return view('admins.view_categories')->withFoodcats($food_cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create_food_category');
    }

    public function getTicketDetail($id)
    {
        $container = Container::find($id);
        $bol = Billoflading::find($container->bol_id);
        $worder = Workorder::find($container->work_order_id);
        $pickaddr = Address::find($bol->pick_up);
        $deliaddr = Address::find($bol->delivery);
        //$tickets = Ticket::where('container_id', $id)->get();

        return view('admins.container_ticket_detail')->withContainer($container)->withBol($bol)->withWorder($worder)->withPickaddr($pickaddr)->withDeliaddr($deliaddr);
        //;
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

            'cat_id'          => 'max:255',
            'food_cat_name'   => 'required|min:1|max:255',
            'cat_type'        => 'max:255',
            'details'         => 'max:255'

        ));

        //store in the database
        $food_cat = new FoodCat;
        $food_cat->cat_id     = $request->cat_id;
        $food_cat->cat_name   = $request->food_cat_name;
        $food_cat->cat_type   = $request->cat_type;
        $food_cat->details    = $request->details;
        $food_cat->status     = 1;
        $food_cat->created_by = $user_id;

        $food_cat->save();

        //session flashing
        Session::flash('success', 'New category successfully created!');

        //return to the show page
        return redirect('/admin/create_category');
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
        $foodcat = FoodCat::find($id);
        return view('admins.edit_food_category')->withFoodcat($foodcat);
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
            'cat_id'         => "max:255",
            'food_cat_name'  => 'required|max:255',
            'cat_slug'       => 'max:255',
            'status'       => 'max:2',
            'details'        => 'max:255'
            ));

        //save the data to the database
        $update = FoodCat::find($id);
        $update->cat_id        = $request->input('cat_id');
        $update->cat_name      = $request->input('food_cat_name');
        $update->cat_slug      = $request->input('cat_slug');
        $update->status       = $request->input('status');
        $update->details       = $request->input('details');
        $update->updated_by    = $user_id;

        //save image//
        // dd($request->hasFile('image'));
        if($request->hasFile('image')){
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('uploads/category/' . $filename);
            Image::make($image)->save($location);

            $update->image = '/uploads/category/'.$filename;
        }

        $update->save();

        //set flash data with success message
        Session::flash('success', 'The food category was successfully updated.');

        //redirect with flash data to posts.show
        return redirect('/admin/foodcat/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find tickets of container and delete
        //FoodCat::where('container_id', $id)->delete();

        //delete the container
        FoodCat::find($id)->delete();

        //flash the message
        Session::flash('success', 'The food category was successfully deleted.');

        //return to the index page
        return redirect('/admin/view_categories');
    }
}