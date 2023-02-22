@extends('admin')
@section('title', 'Showing Orders Reports')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Order Report</h4>
                <div class="toolbar pull-right">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                    <a href="/admin/order_reports">View All</a>
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Order Price</th>
                                <th>Table Number</th>
                                <th>Guest</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <!--th class="disabled-sorting text-right">Actions</th-->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Order Price</th>
                                <th>Table Number</th>
                                <th>Guest</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <!--th class="text-right">Actions</th-->
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            <?php 
                            $r = 0; 
                            $total_price = 0;
                            $total_guest = 0;
                            ?>

                            

                            @foreach($orders as $order)

                            <?php 
                            $r++;
                            $total_price += $order->price;
                            $total_guest += $order->person;
                            ?>

                            <tr>
                                <td>{{$r}}</td>
                                <td>{{ $order->id }}</td>
                                <td><a href="/admin/order_reports_at_customer/{{ $order->cust_id }}">{{ $order->first_name.' '.$order->last_name }}</a></td>
                                <td>&pound; {{ $order->price }}</td>
                                <td>{{ $order->table_no }}</td>
                                <td>{{ $order->person }}</td>
                                <td><a href="/admin/order_reports_at_status/{{ $order->status }}">
                                    {!!
                                        $order->status == 1? '<span style="color:#080">Paid</span>':'<span style="color:#f00">Unpaid</span>'
                                    !!}</a>
                                </td>
                                <td><a href="/admin/order_reports_at_date/{{ date('Y-m-d', strtotime($order->created_at)) }}">{{ date('m/d/Y', strtotime($order->created_at)) }}</a></td>
                                <!--td class="text-right">
                                    <a href="/admin/order/{{ $order->id }}/details" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvr</i></a>
                                    <a href="/admin/order/{{ $order->id }}/payment" class="btn btn-simple btn-warning btn-icon" title="Get Payment"><i class="material-icons">payment</i></a>
                                </td-->
                            </tr>

                            @endforeach

                            <tr>
                                <th></th>
                                <th></th>
                                <th>Total = </th>
                                <th>&pound; {{number_format($total_price, 2)}}</th>
                                <th></th>
                                <th>{{$total_guest }}</th>
                                <th></th>
                                <th></th>
                                <!--th></th-->
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div> <!-- end content-->
        </div> <!--  end card  -->
    </div> <!-- end col-md-12 -->
</div> <!-- end row --> 
@endsection