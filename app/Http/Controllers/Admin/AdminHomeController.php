<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Notify;
use App\Order;
use App\OrderItem;
use App\User;
use Session;
use DB;
use Image;
use Mail;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function email()
    {
        return view('admins.email_promotion');
    }

    public function SendMail(Request $request) {

        $this->validate($request, [
            'subject'   => 'required|max:255',
            'message'   => 'required|max:10000'
            ]);

        $users = User::all();

        foreach($users as $user) {
        
            $data = array(
                'first_name'    => $user->first_name,
                'last_name'     => $user->last_name,
                'subject'       => $request->subject,
                'email'         => $user->email,
                'details'       => $request->message
            );

            Mail::send('admins.email_temp_promotion', $data, function($message) use ($data){
                $message->from('admin@namasteswanley.co.uk');
                $message->to($data['email']);
                $message->subject($data['subject']);
            });

        }

        

        Session::flash('success', 'The email has been sent successfully.');
        return redirect('/admin/send_email/');
    }

    public function emailTicket(Request $request) {

        $this->validate($request, [
            'subject' => 'required|email',
            'details' => '10000'
            ]);

        $ticket = Ticket::find($request->ticket_id);
        
        $data = array(
            'ticket'    => $ticket,
            'container' => $container,
            'bol'       => $bol,
            'workorder' => $workorder,
            'pickaddr'  => $pickaddr,
            'deliaddr'  => $deliaddr,
            'email'     => $request->email
        );

        Mail::send('admins.send_email_ticket', $data, function($message) use ($data){
            $message->from('admin@namasteswanley.co.uk');
            $message->to($data['email']);
            $message->subject('Ticket | Schafer Logistics');
        });

        Session::flash('success', 'The ticket has been sent successfully.');
        return redirect('/admin/container_ticket_detail/'.$container->id);
    }

    public function getEmailTickets($id)
    {
        $bol = Billoflading::find($id);
        return view('admins.send_tickets')->withBol($bol);
    }

    


    ///////////////

    /* all reports */
    public function reports()
    {
        $orders = Order::all();

        return view('admins.reports')->withOrders($orders);
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