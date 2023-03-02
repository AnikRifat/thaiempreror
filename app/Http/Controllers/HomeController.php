<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Users;
use App\User;
use App\FoodCat;
use App\FoodItem;
use App\Order;
use App\OrderItem;
use App\Event;
use Mail;
use Redirect;
use DB;
use Session;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function reservationStore(Request $request)
    {
        return redirect('/');
    }
    public function emailTest()
    {
        $orders = json_decode(json_encode(
            [
                ['item_id' => 1, 'item_name' => 'Papadom', 'item_price' => '0.70', 'item_qty' => 1],
                ['item_id' => 9, 'item_name' => 'Onion Bhaji', 'item_price' => '3.50', 'item_qty' => 2],
                ['item_id' => 3, 'item_name' => 'Mango Chutney', 'item_price' => '0.50', 'item_qty' => 3]
            ]
        ));
        // dd($orders);
        // $orders = OrderItem::where('order_id', 44)->get();
        return view('homepages.email_online_order_for_user')->withName('Rocky')->withPhone('01825322626')->withEmail('rocky@abaacorp.com')->withAddress('village, town,...')->withDetails('details')->withOrder_type('HOME DELIVERY')->withOrders($orders);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservation()
    {
        return view('homepages.reservations');
    }
    public function index()
    {
        // Session::put('_web_order', 'Customer Online Order');
        $cats = FoodCat::where('status', 1)->orderBy('cat_id', 'ASC')->get();
        $items = FoodItem::leftJoin('food_cats', 'food_items.cat_id', 'food_cats.id')->where('food_items.status', 1)->orderBy('food_items.id', 'ASC')->select('food_items.*', 'food_cats.cat_name', 'food_cats.cat_slug')->get();
        $event = Event::orderBy('id', 'DESC')->where('status', 1)->get();
        $blog = Blog::orderBy('id', 'DESC')->where('status', 1)->take(4)->get();

        return view('homepages.index')->withCats($cats)->withItems($items)->withEvents($event)->withBlogs($blog);
    }

    public function blogs()
    {

        $blogs = Blog::paginate(16);
        return view('homepages.blogs', compact('blogs'));
    }

    public function blogdetails($id)
    {
        $leatestBlog = Blog::orderBy('id', 'DESC')->take(4)->get();
        $blog = Blog::find($id);


        $timestamp = $blog->created_at;
        $date = Carbon::parse($timestamp)->format('d F Y');
        $hdate = Carbon::parse($timestamp)->diffForHumans();
        // dd($hdate);

        return view('homepages.blog_details', compact('date', 'hdate', 'blog', 'leatestBlog'));
    }
    public function getCategory($id)
    {
        $category = FoodCat::find($id);
        $cats = FoodCat::where('status', 1)->orderBy('id', 'ASC')->get();
        return view('homepages.index')->withCats($cats)->withCategory($category);
    }

    public function place_order()
    {
        $cats = FoodCat::where('status', 1)->orderBy('id', 'ASC')->get();
        $items = FoodItem::leftJoin('food_cats', 'food_items.cat_id', 'food_cats.id')->where('food_items.status', 1)->orderBy('food_items.id', 'ASC')->select('food_items.*', 'food_cats.cat_name')->get();
        return view('homepages.place_order')->withCats($cats)->withItems($items);
    }

    public function PlaceOrder(Request $request)
    {
        //data validation
        $this->validate($request, array(
            'itemName'    => 'required|max:255',
            'itemPrice'   => 'required|max:255'
        ));

        // dd($request->itemName);
        $orders = [];
        foreach ($request->itemId as $key => $value) {
            array_push($orders, ['item_id' => $request->itemId[$key], 'item_name' => $request->itemName[$key], 'item_price' => $request->itemPrice[$key], 'item_qty' => $request->itemQty[$key]]);
        }

        $orders = json_decode(json_encode($orders));
        Session::put('_orders', $orders);
        return redirect('/confirm_order')->withOrders($orders);
    }

    public function order_confirm()
    {
        $orders = Session::get('_orders');
        return view('homepages.confirm_order')->withOrders($orders);
    }

    public function store(Request $request)
    {
        /* order create start */
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
        } //end if DINE IN check

        if ($request->order_type == 'TAKE AWAY') {
            //validate the data
            $this->validate($request, array(
                'first_name'     => 'required|max:255',
                'last_name'      => 'max:255',
                'primary_phone'  => 'required|max:255',
                'secondary_phone' => 'max:255',
                'details'        => 'max:500'

            ));
        } //end if TAKE AWAY check

        if ($request->order_type == 'HOME DELIVERY') {
            //validate the data
            $this->validate($request, array(
                'first_name'        => 'required|max:255',
                'last_name'         => 'max:255',
                'primary_phone'     => 'required|max:20',
                'secondary_phone'   => 'max:20',
                'email'             => 'max:255',
                'property_no'       => 'required|max:255',
                'town_name'         => 'required|max:255',
                'post_code'         => 'required|max:255',
                'order_time_date'   => 'max:255',
                'note'              => 'max:500',
                'details'           => 'max:500'

            ));
        } //end if HOME DELIVERY check

        if (empty(DB::table('users')->where('primary_phone', $request->primary_phone)->first())) {
            //store in the database
            $user = new User;
            $user->first_name      = $request->first_name;
            $user->last_name       = $request->last_name;
            $user->primary_phone   = $request->primary_phone;
            $user->secondary_phone = $request->secondary_phone;
            $user->email           = $request->email;
            $user->property_no     = $request->property_no;
            $user->town_name       = $request->town_name;
            $user->post_code       = $request->post_code;
            $user->note            = $request->note;
            $user->created_by      = 0;
            $user->save();
        }

        $user_id = User::where('primary_phone', $request->primary_phone)->first()->id;

        //store in the database
        $order = new Order;
        $order->order_type       =   $request->order_type;
        $order->price            =   0;
        $order->order_time_date  =   $request->order_time_date;
        $order->guest            =   $request->number_of_guest;
        $order->table_no         =   $request->table_no;
        $order->user_id          =   $user_id;
        $order->first_name       =   $request->first_name;
        $order->last_name        =   $request->last_name;
        $order->primary_phone    =   $request->primary_phone;
        $order->property_no      =   $request->property_no;
        $order->town_name        =   $request->town_name;
        $order->post_code        =   $request->post_code;
        $order->note             =   $request->note;
        $order->details          =   $request->details;
        $order->status           =   0;
        $order->created_by       =   0;

        $order->save();

        $order_id = Order::orderBy('id', 'DESC')->first()->id;

        /* store order items */
        /* check specail order */

        $totalPrice = 0;
        $spodr = '';
        $ItemPrice = 0;

        foreach ($request->itemId as $key => $value) {
            $item = FoodItem::find($request->itemId[$key]);
            if ($item->food_slug == 'monday_exclusive' || $item->food_slug == 'banqueting_night') {
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

                    if ($item->cat_slug == 'starters' && $item->food_slug == 'lamb_chops') {
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
            $orderItem->item_price    = $ItemPrice * $request->itemQty[$key];
            $orderItem->remarks       = $request->remarks[$key];
            $orderItem->order_id      = $order_id;
            $orderItem->user_id       = $user_id;
            $orderItem->status        = 1;
            $orderItem->created_by    = 0;

            $orderItem->save();

            $totalPrice += $ItemPrice * $request->itemQty[$key];
        }

        $priceUpdate = Order::find($order_id);
        $priceUpdate->price = $totalPrice;
        $priceUpdate->save();
        /* order create stop */

        $orders = [];
        foreach ($request->itemId as $key => $value) {
            array_push($orders, ['item_id' => $request->itemId[$key], 'item_name' => $request->itemName[$key], 'item_price' => $request->itemPrice[$key], 'item_qty' => $request->itemQty[$key], 'price' => $request->Price[$key]]);
        }

        $orders = json_decode(json_encode($orders));

        $data = array(
            'orders'        => $orders,
            'name'          => $request->first_name . ' ' . $request->last_name,
            'phone'         => $request->primary_phone,
            'email'         => $request->email,
            'order_type'    => $request->order_type,
            'address'       => $request->property_no . ', ' . $request->town_name . ', ' . $request->post_code,
            'details'       => $request->details,
            'total_price'   => $request->total_price
        );

        Session::forget('_orders');

        // email for admin
        // Mail::send('homepages.email_online_order', $data, function($message) use ($data){
        //     $message->from($data['email']);
        //     // $message->to('rirchse@gmail.com');
        //     $message->to('thai_emperor@hotmail.com');
        //     $message->subject('Online Order');
        // });

        // //mail for customer 
        // Mail::send('homepages.email_online_order_for_user', $data, function($message) use ($data){
        //     $message->from('thai_emperor@hotmail.com');
        //     $message->to($data['email']);
        //     $message->subject('Online Order');
        // });

        Session::flash('success', 'Thank you. Your order has been placed. For home delivery, please expect a minimum of 45 minutes to up to an hour. For take away collection, Please expect 30 minutes and a 10% discount.');
        return redirect('/');
    }
}
