<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Notify;
use App\FoodCat;
use App\FoodSubCat;
use App\FoodItem;
use App\Container;
use App\Ticket;
use App\Address;
use App\User;
use Session;
use DB;
use Image;
use File;

class FoodController extends Controller
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
        $foods = FoodItem::leftJoin('food_cats', 'food_items.cat_id', 'food_cats.id')
        ->leftJoin('food_sub_cats', 'food_items.sub_cat_id', 'food_sub_cats.id')
        ->orderBy('food_items.id', 'DESC')
        ->select('food_items.*', 'food_cats.cat_name', 'food_sub_cats.sub_cat_name')
        ->get();
        return view('admins.view_food_items')->withFoods($foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = FoodCat::orderBy('cat_id', 'ASC')->get();
        $subcats = FoodSubCat::orderBy('sub_cat_id', 'ASC')->get();
        return view('admins.create_food_item')->withCats($cats)->withSubcats($subcats);
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

            'cat_id'        => 'required|max:255',
            'sub_cat_id'    => 'max:255',
            'food_name'     => 'required|max:255',
            'price'         => 'required|max:255',
            'discount'      => 'max:255',
            'person'        => 'max:255',
            'details'       => 'max:500'

        ));

        //store in the database
        $food = new FoodItem;
        $food->cat_id     = $request->cat_id;
        $food->sub_cat_id = $request->sub_cat_id;
        $food->food_name  = $request->food_name;
        $food->price      = $request->price;
        $food->discount   = $request->discount;
        $food->person     = $request->person;
        $food->details    = $request->details;
        $food->created_by = $user_id;
        $food->status     = 1;

        $food->save();

        //session flashing
        Session::flash('success', 'New Food successfully created!');
        

        //return to the show page
        return redirect('/admin/create_food_item/');
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
        $food = FoodItem::find($id);
        $cats = FoodCat::all();
        $subcats = FoodSubCat::all();
        return view('admins.edit_food_item')->withFood($food)->withCats($cats)->withSubcats($subcats);
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
            'food_name'     => 'required|max:255',
            'food_slug'     => 'max:255',
            'food_type'     => 'max:255',
            'price'         => 'max:255',
            'status'        => 'max:255',
            'for_app'       => 'max:255',
            'for_web'       => 'max:255',
            'details'       => 'max:500',
            'item_image'    => 'image'
            ));

        //get exists image
        $exist_image = FoodItem::find($id)->image;

        //save the data to the database
        $update = FoodItem::find($id);
        $update->cat_id     = $request->input('cat_id');
        $update->sub_cat_id = $request->input('sub_cat_id');
        $update->food_name  = $request->input('food_name');
        $update->food_slug  = $request->input('food_slug');
        $update->food_type  = $request->input('food_type');
        $update->price      = $request->input('price');
        $update->status     = $request->status == ''? 0: $request->input('status');
        $update->for_app    = $request->for_app == ''? 0: $request->input('for_app');
        $update->for_web    = $request->for_web == ''? 0: $request->input('for_web');
        $update->details    = $request->input('details');
        $update->updated_by = $user_id;

        //save image//
        if($request->hasFile('item_image')){
            $image    = $request->file('item_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = ('images/items/' . $filename);
            Image::make($image)->resize(600, 600)->save($location);

            $update->image = $filename;
        }

        $update->save();

        //delete exists image
        $ex_img = 'images/items/'.$exist_image;
        if(File::exists($ex_img)){
            File::delete($ex_img);
        }

        //set flash data with success message
        Session::flash('success', 'The food item was successfully updated.');

        //redirect with flash data to posts.show
        return redirect('/admin/food/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //find bill of lading and delete
        FoodItem::find($id)->delete();

        //flash the message
        Session::flash('success', 'The food was successfully deleted.');

        //return to the index page
        return redirect('/admin/view_food_items');
    }
}