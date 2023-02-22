<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\FoodCat;
use App\FoodSubCat;
use App\FoodItem;
use App\Order;
use App\OrderItem;
use App\Notify;
use App\User;
use Session;
use DB;
use Image;
use Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /* take away customers */
    public function TakeAwayUsers()
    {
        $users = Order::where('order_type', 'TAKE AWAY')->groupBy('first_name', 'last_name', 'primary_phone')->select('first_name', 'last_name', 'primary_phone')->get();
        return view('admins.view_take_away_customers')->withUsers($users);
    }

    /* view order as status paid / unpaid*/
    public function order_type($type)
    {
        $orders = [];
        if ($type == "paid") {
            $orders = Order::where('status', 1)->get();
        } else if ($type == "unpaid") {
            $orders = Order::where('status', 0)->get();
        }

        return view('admins.orders.view_orders')->withOrders($orders);

    }
/* choose order option first page */
    public function order_option()
    {
        return view('admins.orders.create_order_option');
    }

    /* choose order */
    public function choose_order($order_type)
    {
        Session::put('_order_type', $order_type);

        if ($order_type == 'DINE IN') {
            return redirect('/admin/create_order/');
        } else 
        // if ($order_type == 'TAKE AWAY') {
        //     return redirect('/admin/take_away_customers/');
        // } else 
        {
            return redirect('/admin/view_customers/');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('admins.orders.view_orders')->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* create order as customer */
    public function create_order($id)
    {
        // if (empty(Session::get('_order_type'))) {
        //     return redirect('/admin/choose_order_option');
        // }

        $user = [];

        if( count(Order::where('primary_phone', $id)->get()) > 0 ){
            $user = Order::where('primary_phone', $id)->orderBy('id', 'DESC')->first();
        } else {
            $user = User::find($id);
        }

        $cats = FoodCat::all();
        $foods = FoodItem::orderBy('cat_id', 'ASC')->get();
        return view('admins.orders.create_order')->withUser($user)->withFoods($foods)->withCats($cats);
    }

    /* default create order */
    public function create()
    {
        if (empty(Session::get('_order_type'))) {
            return redirect('/admin/choose_order_option');
        }

        $cats = FoodCat::orderBy('cat_id', 'ASC')->get();
        $foods = FoodItem::orderBy('cat_id', 'ASC')->get();
        return view('admins.orders.create_order')->withFoods($foods)->withCats($cats);
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
        //validate the order type
        $this->validate($request, array(
            'order_type' => 'required|max:255'
        ));

        if ($request->order_type == 'DINE IN') {
            //validate the data
            $this->validate($request, array(

                //'totalPrice'       => 'required|max:255',
                'table_no'         => 'required|max:255',
                'number_of_guest'  => 'required|max:255',
                'details'          => 'max:500'

            ));
        }//end if DINE IN check

        if ($request->order_type == 'TAKE AWAY') {
            //validate the data
            $this->validate($request, array(

                // 'totalPrice'     => 'required|max:255',
                'first_name'     => 'required|max:255',
                'last_name'      => 'max:255',
                'primary_phone'  => 'required|max:255',
                'details'        => 'max:500'

            ));
        }//end if TAKE AWAY check

        if ($request->order_type == 'HOME DELIVERY') {
            //validate the data
            $this->validate($request, array(

                // 'totalPrice'        => 'required|max:255',
                'user_id'           => 'required|max:255',
                'first_name'        => 'required|max:255',
                'last_name'         => 'max:255',
                'primary_phone'     => 'required|max:20',
                'property_no'       => 'required|max:255',
                'town_name'         => 'required|max:255',
                'post_code'         => 'max:255',
                'order_time_date'   => 'max:255',
                'note'              => 'max:500',
                'details'           => 'max:500'

            ));
        }//end if HOME DELIVERY check

        //store in the database
        $order = new Order;
        $order->order_type       =   $request->order_type;
        $order->price            =   0;
        $order->order_time_date  =   $request->order_time_date;
        $order->guest            =   $request->number_of_guest;
        $order->table_no         =   $request->table_no;
        $order->user_id          =   $request->user_id;
        $order->first_name       =   $request->first_name;
        $order->last_name        =   $request->last_name;
        $order->primary_phone    =   $request->primary_phone;
        $order->property_no      =   $request->property_no;
        $order->town_name        =   $request->town_name;
        $order->post_code        =   $request->post_code;
        $order->note             =   $request->note;
        $order->details          =   $request->details;
        $order->status           =   0;
        $order->created_by       =   $user_id;

        $order->save();

        $order_id = Order::orderBy('id', 'DESC')->first()->id;

        /* store order items */
        /* check specail order */

        $totalPrice = 0;
        $spodr = '';
        $ItemPrice = 0;

        foreach ($request->itemId as $key => $value) {
            $item = FoodItem::find($request->itemId[$key]);
            if($item->food_slug == 'monday_exclusive' || $item->food_slug == 'banqueting_night') {
                $spodr = $item->food_slug;
            }
        }

        foreach ($request->itemId as $key => $value) {
            $item = FoodItem::leftJoin('food_cats', 'food_items.cat_id', 'food_cats.id')
            ->leftJoin('food_sub_cats', 'food_items.sub_cat_id', 'food_sub_cats.id')
            ->select('food_items.*', 'food_cats.cat_slug', 'food_sub_cats.sub_cat_slug')
            ->find($request->itemId[$key]);

            if ($spodr == 'monday_exclusive') {
                if ($item->cat_slug == 'pre_appetisers' || $item->sub_cat_slug == 'traditional_dishes' || $item->cat_slug == 'vegetable_side_dishes' || $item->cat_slug == 'rice' || $item->cat_slug == 'homemade_bread' || $item->cat_slug == 'starters') {

                    if ($item->cat_slug == 'starters' && $item->food_slug == 'lamb_chops'){
                        $ItemPrice = 2.50;
                    } else if ($item->cat_slug == 'starters') {
                        $ItemPrice = 2;
                    } else if ($item->food_type == 'prawn' || $item->food_type == 'king_prawn') {
                        $ItemPrice = 2.50;
                    } else if ($item->cat_slug != 'traditional_dishes' && $item->cat_slug != 'pre_appetisers' && $item->cat_slug != 'vegetable_side_dishes' && $item->cat_slug != 'rice' && $item->cat_slug != 'homemade_bread') {
                        $ItemPrice = 3.50;
                    } else {
                        $ItemPrice = 0;
                    }
                } else {
                    $ItemPrice = $item->price;
                }

            } else if ($spodr == 'banqueting_night' && $item->cat_slug != 'special') {
                $ItemPrice = 0;
                if ($item->food_type == 'prawn' || $item->food_type == 'king_prawn') {
                    $ItemPrice = 1.50;
                } else if ($item->cat_slug == 'starters' && $item->food_slug == 'lamb_chops') {
                    $ItemPrice = 1.00;
                }
            } else {
                $ItemPrice = $item->price;
            }

            $orderItem = new OrderItem;
            $orderItem->item_id       = $item->id;
            $orderItem->cat_id        = $item->cat_id;
            $orderItem->sub_cat_id    = $item->sub_cat_id;
            $orderItem->item_name     = $item->food_name;
            $orderItem->unit_price    = $ItemPrice;
            $orderItem->item_qty      = $request->itemQty[$key];
            $orderItem->item_price    = $ItemPrice*$request->itemQty[$key];
            $orderItem->remarks       = $request->remarks[$key];
            $orderItem->order_id      = $order_id;
            $orderItem->user_id       = $request->user_id;
            $orderItem->status        = 1;
            $orderItem->created_by    = $user_id;

            $orderItem->save();

            $totalPrice += $ItemPrice*$request->itemQty[$key];
        }

        $priceUpdate = Order::find($order_id);
        $priceUpdate->price = $totalPrice;
        $priceUpdate->save();

        //session flashing
        Session::flash('success', 'New order successfully created!');

        //return to the show page
        return redirect('/admin/order/'.$order_id.'/details');
    }

    /* orders reports */
    public function orderReports()
    {
        $orders = Order::leftJoin('users', 'orders.user_id', 'users.id')
        ->select('orders.*', 'users.first_name', 'users.last_name', 'users.id as cust_id')
        ->orderBy('orders.id', 'DESC')->get();
        return view('admins.orders.orders_reports')->withOrders($orders);
    }

    public function orderReportsCustomer($cust_id)
    {
        $orders = Order::leftJoin('users', 'orders.user_id', 'users.id')
        ->where('orders.user_id', $cust_id)
        ->select('orders.*', 'users.first_name', 'users.last_name', 'users.id as cust_id')
        ->orderBy('orders.id', 'DESC')->get();
        return view('admins.orders.orders_reports')->withOrders($orders);
    }

    public function orderReportsStatus($status)
    {
        $orders = Order::leftJoin('users', 'orders.user_id', 'users.id')
        ->where('orders.status', $status)
        ->select('orders.*', 'users.first_name', 'users.last_name', 'users.id as cust_id')
        ->orderBy('orders.id', 'DESC')->get();
        return view('admins.orders.orders_reports')->withOrders($orders);
    }

    public function orderReportsDate($date)
    {
        $orders = Order::leftJoin('users', 'orders.user_id', 'users.id')
        ->where('orders.created_at', 'like', '%'.$date.'%')
        ->select('orders.*', 'users.first_name', 'users.last_name', 'users.id as cust_id')
        ->orderBy('orders.id', 'DESC')->get();
        return view('admins.orders.orders_reports')->withOrders($orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::leftJoin('admins', 'orders.created_by', 'admins.id')
        ->select('orders.*', 'admins.first_name as adm_first_name', 'admins.last_name as adm_last_name')
        ->find($id);

        $cats = OrderItem::leftJoin('food_cats', 'order_items.cat_id', 'food_cats.id')
        ->where('order_items.order_id', $id)
        ->groupBy('order_items.cat_id', 'food_cats.cat_name')
        ->select('order_items.cat_id', 'food_cats.cat_name')
        ->orderBy('order_items.cat_id', 'ASC')
        ->get();
        $subcats = OrderItem::leftJoin('food_sub_cats', 'order_items.sub_cat_id', 'food_sub_cats.id')
        ->where('order_items.order_id', $id)->whereNotNull('order_items.sub_cat_id')
        ->groupBy('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->select('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->get();
        return view('admins.orders.details_order')->withOrder($order)->withCats($cats)->withSubcats($subcats);
    }

    //test function auto printing test
    public function orderForPrint()
    {
        $order = Order::leftJoin('admins', 'orders.created_by', 'admins.id')
        ->select('orders.*', 'admins.first_name as adm_first_name', 'admins.last_name as adm_last_name')
        ->find($id);

        $cats = OrderItem::leftJoin('food_cats', 'order_items.cat_id', 'food_cats.id')
        ->where('order_items.order_id', $id)
        ->groupBy('order_items.cat_id', 'food_cats.cat_name')
        ->select('order_items.cat_id', 'food_cats.cat_name')
        ->orderBy('order_items.cat_id', 'ASC')
        ->get();
        $subcats = OrderItem::leftJoin('food_sub_cats', 'order_items.sub_cat_id', 'food_sub_cats.id')
        ->where('order_items.order_id', $id)->whereNotNull('order_items.sub_cat_id')
        ->groupBy('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->select('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->get();
        return view('admins.details_order')->withOrder($order)->withCats($cats)->withSubcats($subcats);
        return view('admins.orders.read_order_for_print', compact('order'));
    }

    /* print order */
    public function order_print($id)
    {
        $order = Order::leftJoin('admins', 'orders.created_by', 'admins.id')
        ->select('orders.*', 'admins.first_name as adm_first_name', 'admins.last_name as adm_last_name')
        ->find($id);
        
        $cats = OrderItem::leftJoin('food_cats', 'order_items.cat_id', 'food_cats.id')
        ->where('order_items.order_id', $id)
        ->groupBy('order_items.cat_id', 'food_cats.cat_name')
        ->select('order_items.cat_id', 'food_cats.cat_name')
        ->orderBy('order_items.cat_id', 'ASC')
        ->get();
        $subcats = OrderItem::leftJoin('food_sub_cats', 'order_items.sub_cat_id', 'food_sub_cats.id')
        ->where('order_items.order_id', $id)->whereNotNull('order_items.sub_cat_id')
        ->groupBy('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->select('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->get();
        return view('admins.orders.print_order')->withOrder($order)->withCats($cats)->withSubcats($subcats);
    }

    //kitchen copy print
    public function kitchen_copy_print($id)
    {
        $order = Order::leftJoin('admins', 'orders.created_by', 'admins.id')
        ->select('orders.*', 'admins.first_name as adm_first_name', 'admins.last_name as adm_last_name')
        ->find($id);

        $cats = OrderItem::leftJoin('food_cats', 'order_items.cat_id', 'food_cats.id')
        ->where('order_items.order_id', $id)
        ->where('food_cats.cat_slug', '!=', 'drink_and_dessert')
        ->groupBy('order_items.cat_id', 'food_cats.cat_name')
        ->orderBy('order_items.cat_id', 'ASC')
        ->select('order_items.cat_id', 'food_cats.cat_name')
        ->get();

        $subcats = OrderItem::leftJoin('food_sub_cats', 'order_items.sub_cat_id', 'food_sub_cats.id')
        ->where('order_items.order_id', $id)->whereNotNull('order_items.sub_cat_id')
        ->groupBy('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->select('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->get();
        return view('admins.print_kitchen_copy')->withOrder($order)->withCats($cats)->withSubcats($subcats);
    }
    //get recent order
    public function getRecentOrder()
    {
        $orders = Order::where('print_status', 0)->get();
        return response()->json([
            'success' => $orders
            ]);
    }

    //kitech print auto
    public function print_kitchen_auto()
    {
        if(Order::where('print_status', 0)->first()){

        $order = Order::leftJoin('admins', 'orders.created_by', 'admins.id')
        ->select('orders.*', 'admins.first_name as adm_first_name', 'admins.last_name as adm_last_name')
        ->first();

        $cats = OrderItem::leftJoin('food_cats', 'order_items.cat_id', 'food_cats.id')
        ->where('order_items.order_id', $order->id)
        ->where('food_cats.cat_slug', '!=', 'drink_and_dessert')
        ->groupBy('order_items.cat_id', 'food_cats.cat_name')
        ->orderBy('order_items.cat_id', 'ASC')
        ->select('order_items.cat_id', 'food_cats.cat_name')
        ->get();

        $subcats = OrderItem::leftJoin('food_sub_cats', 'order_items.sub_cat_id', 'food_sub_cats.id')
        ->where('order_items.order_id', $order->id)->whereNotNull('order_items.sub_cat_id')
        ->groupBy('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->select('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->get();
        return view('admins.print_kitchen_auto')->withOrder($order)->withCats($cats)->withSubcats($subcats);
    }else{
        return view('admins.print_kitchen_auto');
    }
    }

    /* print for bar */
    public function print_bar($id)
    {
        $order = Order::leftJoin('admins', 'orders.created_by', 'admins.id')
        ->select('orders.*', 'admins.first_name as adm_first_name', 'admins.last_name as adm_last_name')
        ->find($id);
        $cats = OrderItem::leftJoin('food_cats', 'order_items.cat_id', 'food_cats.id')
        ->where('order_items.order_id', $id)
        ->where('food_cats.cat_slug', 'drink_and_dessert')
        ->groupBy('order_items.cat_id', 'food_cats.cat_name')
        ->orderBy('order_items.cat_id', 'ASC')
        ->select('order_items.cat_id', 'food_cats.cat_name')
        ->get();
        $subcats = OrderItem::leftJoin('food_sub_cats', 'order_items.sub_cat_id', 'food_sub_cats.id')
        ->where('order_items.order_id', $id)->whereNotNull('order_items.sub_cat_id')
        ->groupBy('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->select('order_items.sub_cat_id', 'food_sub_cats.sub_cat_name')
        ->get();
        return view('admins.print_bar')->withOrder($order)->withCats($cats)->withSubcats($subcats);
    }

    /* print customer address */
    public function print_addr($id)
    {
        $order = Order::find($id);
        return view('admins.print_address')->withOrder($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        Session::put('_order_type', $order->order_type);

        $cats = FoodCat::orderBy('cat_id', 'ASC')->where('status', 1)->get();
        $items = OrderItem::where('order_id', $order->id)->get();

        return view('admins.orders.edit_order')->withOrder($order)->withCats($cats)->withItems($items);
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
        //validate the order type
        $this->validate($request, array(
            'order_type' => 'required|max:255'
        ));

        if ($request->order_type == 'DINE IN') {
            //validate the data
            $this->validate($request, array(
                'table_no'         => 'required|max:255',
                'number_of_guest'  => 'required|max:255',
                'details'          => 'max:500'

            ));
        }//end if DINE IN check

        if ($request->order_type == 'TAKE AWAY') {
            //validate the data
            $this->validate($request, array(
                'first_name'     => 'required|max:255',
                'last_name'      => 'max:255',
                'primary_phone'  => 'required|max:255',
                'details'        => 'max:500'

            ));
        }//end if TAKE AWAY check

        if ($request->order_type == 'HOME DELIVERY') {
            //validate the data
            $this->validate($request, array(

                'first_name'        => 'required|max:255',
                'last_name'         => 'max:255',
                'primary_phone'     => 'required|max:20',
                'property_no'       => 'required|max:255',
                'town_name'         => 'required|max:255',
                'post_code'         => 'max:255',
                'order_time_date'   => 'max:255',
                'note'              => 'max:500',
                'details'           => 'max:500'

            ));
        }//end if HOME DELIVERY check

        //store in the database
        $order = Order::find($id);
        $order->order_type       =   $request->input('order_type');
        $order->order_time_date  =   $request->input('order_time_date');
        $order->guest            =   $request->input('number_of_guest');
        $order->table_no         =   $request->input('table_no');
        $order->user_id          =   $request->input('user_id');
        $order->first_name       =   $request->input('first_name');
        $order->last_name        =   $request->input('last_name');
        $order->primary_phone    =   $request->input('primary_phone');
        $order->property_no      =   $request->input('property_no');
        $order->town_name        =   $request->input('town_name');
        $order->post_code        =   $request->input('post_code');
        $order->note             =   $request->input('note');
        $order->details          =   $request->input('details');
        $order->status           =   0;
        $order->updated_by       =   $user_id;

        $order->save();

        /* store order items */
        /* check specail order */

        $totalPrice = 0;
        $spodr = '';
        $ItemPrice = 0;

        foreach ($request->itemId as $key => $value) {
            $item = FoodItem::find($request->itemId[$key]);
            if($item->food_slug == 'monday_exclusive' || $item->food_slug == 'banqueting_night') {
                $spodr = $item->food_slug;
            }
        }

        /* loop for food add, update*/
        foreach ($request->itemId as $key => $value) {
            $item = FoodItem::leftJoin('food_cats', 'food_items.cat_id', 'food_cats.id')
            ->leftJoin('food_sub_cats', 'food_items.sub_cat_id', 'food_sub_cats.id')
            ->select('food_items.*', 'food_cats.cat_slug', 'food_sub_cats.sub_cat_slug')
            ->find($request->itemId[$key]);

            if ($spodr == 'monday_exclusive') {
                if ($item->cat_slug == 'pre_appetisers' || $item->sub_cat_slug == 'traditional_dishes' || $item->cat_slug == 'vegetable_side_dishes' || $item->cat_slug == 'rice' || $item->cat_slug == 'homemade_bread' || $item->cat_slug == 'starters') {

                    if ($item->cat_slug == 'starters' && $item->food_slug == 'lamb_chops'){
                        $ItemPrice = 2.50;
                    } else if ($item->cat_slug == 'starters') {
                        $ItemPrice = 2;
                    } else if ($item->food_type == 'prawn' || $item->food_type == 'king_prawn') {
                        $ItemPrice = 2.50;
                    } else if ($item->cat_slug != 'traditional_dishes' && $item->cat_slug != 'pre_appetisers' && $item->cat_slug != 'vegetable_side_dishes' && $item->cat_slug != 'rice' && $item->cat_slug != 'homemade_bread') {
                        $ItemPrice = 3.50;
                    } else {
                        $ItemPrice = 0;
                    }
                } else {
                    $ItemPrice = $item->price;
                }

            } else if ($spodr == 'banqueting_night' && $item->cat_slug != 'special') {
                $ItemPrice = 0;
                if ($item->food_type == 'prawn' || $item->food_type == 'king_prawn') {
                    $ItemPrice = 1.50;
                } else if ($item->cat_slug == 'starters' && $item->food_slug == 'lamb_chops') {
                    $ItemPrice = 1.00;
                }
            } else {
                $ItemPrice = $item->price;
            }

            /* not match in database then add item */
            $orderItem = OrderItem::where('order_id', $id)->where('item_id', $request->itemId[$key])->first();
            if(empty($orderItem)) {
                // create new
                $create = new OrderItem;
                $create->item_id       = $item->id;
                $create->cat_id        = $item->cat_id;
                $create->sub_cat_id    = $item->sub_cat_id;
                $create->item_name     = $item->food_name;
                $create->unit_price    = $ItemPrice;
                $create->item_qty      = $request->itemQty[$key];
                $create->item_price    = $ItemPrice*$request->itemQty[$key];
                $create->remarks       = $request->remarks[$key];
                $create->order_id      = $id;
                $create->user_id       = $request->user_id;
                $create->status        = 1;
                $create->created_by    = $user_id;

                $create->save();

                $totalPrice += $ItemPrice*$request->itemQty[$key];

                /* existing item in database update */
            } else if ($request->itemId[$key] == $orderItem->item_id) {
                // update
                $update = OrderItem::find($orderItem->id);
                $update->item_qty      = $request->itemQty[$key];
                $update->item_price    = $ItemPrice*$request->itemQty[$key];
                $update->remarks       = $request->remarks[$key];
                $update->updated_by    = $user_id;
                $update->save();

                $totalPrice += $ItemPrice*$request->itemQty[$key];
            }
        } // loop end food add, update

        $priceUpdate = Order::find($id);
        $priceUpdate->price = $totalPrice;
        $priceUpdate->save();

        /* delete remove items from order */
        $db_items = OrderItem::where('order_id', $id)->select('item_id')->get();
        $dbarray = [];
        foreach ($db_items as $key => $value) {
            array_push($dbarray, $value->item_id);
        }

        $formarray = $request->itemId;            
        $nomatch = array_diff($dbarray, $formarray);

        foreach($nomatch as $key => $value) {
            OrderItem::where('order_id', $id)->where('item_id', $value)->first()->delete();
        }

        //session flashing
        Session::flash('success', 'New order successfully updated!');

        //return to the show page
        return redirect('/admin/order/'.$id.'/details');
    }

    public function getPayment($id)
    {
        $order = Order::find($id);
        return view('admins.create_payment')->withOrder($order);
    }

    public function storePayment(Request $request, $id)
    {
        $user_id = Auth::guard('admin')->user()->id;

        //validate the data
        $this->validate($request, array(

            'cash_pay'    => 'nullable|numeric|max:9999',
            'card_pay'    => 'nullable|numeric|max:9999',
            'vat'         => 'max:9999',
            'tips'        => 'max:9999',
            'discount'    => 'max:9999',
            'note'        => 'max:500'

        ));

        $order = Order::find($id);

        // if ($order->status == 1) {
        //     Session::flash('error', 'Payment already completed!');
        //     return redirect('/admin/order/'.$id.'/payment');
        // } 

        if ( empty($request->cash_pay) && empty($request->card_pay) ) {
            //session flashing
            Session::flash('error', 'Cash or Card Payment field is required!');
            return redirect('/admin/order/'.$id.'/payment');
        }
        
        $total_due = $order->price;
        $disc      = $request->discount;
        $payable   = $total_due - number_format(($total_due * $disc / 100), 2);
        $payment   = $request->cash_pay + $request->card_pay;

        // dd(number_format($payable-$payment, 0));

        if (number_format($payable - $payment, 0) != 0) {
            Session::flash('error', 'Pay amount does not match!');
            return redirect('/admin/order/'.$id.'/payment');
        }

        //store in the database
        $order = Order::find($id);
        $order->cash_pay       =   number_format($request->cash_pay, 2);
        $order->card_pay       =   number_format($request->card_pay, 2);
        $order->vat            =   $request->vat;
        $order->tips           =   $request->tips;
        $order->discount       =   $request->discount;
        $order->payment_note   =   $request->note;
        $order->status         =   1;
        $order->updated_by     =   $user_id;

        $order->save();

        //session flashing
        Session::flash('success', 'Payment Complete!');

        //return to the show page
        return redirect('/admin/order/'.$id.'/details');
    }

    public function editPayment($id)
    {
        $order = Order::find($id);
        return view('admins.edit_payment')->withOrder($order);
    }

    /* payment update */
    public function UpdatePayment(Request $request, $id)
    {
        $user_id = Auth::guard('admin')->user()->id;

        //validate the data
        $this->validate($request, array(

            'cash_pay'    => 'nullable|numeric|max:9999',
            'card_pay'    => 'nullable|numeric|max:9999',
            'vat'         => 'max:9999',
            'tips'        => 'max:9999',
            'discount'    => 'max:9999',
            'note'        => 'max:500'

        ));

        $order = Order::find($id);

        if ( empty($request->cash_pay) && empty($request->card_pay) ) {
            //session flashing
            Session::flash('error', 'Cash or Card Payment field is required!');
            return redirect('/admin/order/'.$id.'/payment');
        }
        
        $total_due = $order->price;
        $disc      = $request->discount;
        $payable   = $total_due - number_format(($total_due * $disc / 100), 2);
        $payment   = $request->cash_pay + $request->card_pay;

        if (number_format($payable - $payment, 0) != 0) {
            Session::flash('error', 'Pay amount does not match!');
            return redirect('/admin/order/'.$id.'/payment');
        }

        //store in the database
        $order = Order::find($id);
        $order->cash_pay       =   number_format($request->input('cash_pay'), 2);
        $order->card_pay       =   number_format($request->input('card_pay'), 2);
        $order->vat            =   $request->input('vat');
        $order->tips           =   $request->input('tips');
        $order->discount       =   $request->input('discount');
        $order->payment_note   =   $request->input('note');
        $order->status         =   1;
        $order->updated_by     =   $user_id;

        $order->save();

        //session flashing
        Session::flash('success', 'Payment Updated!');

        //return to the show page
        return redirect('/admin/order/'.$id.'/details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the ordered itmes and delete
        if(count(OrderItem::where('order_id', $id)->get()) >0) {
            foreach(OrderItem::where('order_id', $id)->get() as $item){
                $item->delete();
            }
        }

        //find order and delete
        Order::find($id)->delete();

        //flash the message
        Session::flash('success', 'The order was successfully deleted.');

        //return to the index page
        return redirect('/admin/view_orders');
    }

    public function orderDelMulti(Request $request)
    {
        // validate
        $this->validate($request, [
            'order_id' => 'required'
            ]);

        foreach ($request->order_id as $key => $value) {
            //find the ordered itmes and delete
            if(count(OrderItem::where('order_id', $value)->get()) > 0) {
                foreach(OrderItem::where('order_id', $value)->get() as $item){
                    $item->delete();
                }
            }

            //find order and delete
            Order::find($value)->delete();
        }

        //flash the message
        Session::flash('success', 'The orders was successfully deleted.');

        //return to the index page
        return redirect('/admin/view_orders');
    }
}