@extends('admin')
@section('title', 'All Reports')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">All Reports</h4>
                <div class="toolbar pull-right">
                    <!--        Here you can write extra buttons/actions for the toolbar       -->
                    {{-- <a href="/admin/order_reports">View All</a> --}}
                </div>
                <div class="material-datatables">
                    <table class="table table-bordered table-hover" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th>Report Type</th>
                                <th>Daily</th>
                                <th>Weekly</th>
                                <th>Monthly</th>
                                <th>Yearly</th>
                                <th>All Of</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Sales:</th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d', strtotime($order->created_at)) == date('Y-m-d') )
                                    <?php $sales += $order->price; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d') < date('Y-m-d', strtotime($order->created_at.'+6 days')) )
                                    <?php $sales += $order->price; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m', strtotime($order->created_at)) == date('Y-m') )
                                    <?php $sales += $order->price; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y', strtotime($order->created_at)) == date('Y') )
                                    <?php $sales += $order->price; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if( $order->status == 1 )
                                    <?php $sales += $order->price; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                            </tr>
                            <tr>
                                <th>Cash/Card/Tips</th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d', strtotime($order->created_at)) == date('Y-m-d') )
                                    <?php $sales += $order->cash_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d', strtotime($order->created_at)) == date('Y-m-d') )
                                    <?php $sales += $order->card_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d', strtotime($order->created_at)) == date('Y-m-d') )
                                    <?php $sales += $order->tips; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d') < date('Y-m-d', strtotime($order->created_at.'+6 days')) )
                                    <?php $sales += $order->cash_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d') < date('Y-m-d', strtotime($order->created_at.'+6 days')) )
                                    <?php $sales += $order->card_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d') < date('Y-m-d', strtotime($order->created_at.'+6 days')) )
                                    <?php $sales += $order->tips; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m', strtotime($order->created_at)) == date('Y-m') )
                                    <?php $sales += $order->cash_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m', strtotime($order->created_at)) == date('Y-m') )
                                    <?php $sales += $order->card_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m', strtotime($order->created_at)) == date('Y-m') )
                                    <?php $sales += $order->tips; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y', strtotime($order->created_at)) == date('Y') )
                                    <?php $sales += $order->cash_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y', strtotime($order->created_at)) == date('Y') )
                                    <?php $sales += $order->card_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y', strtotime($order->created_at)) == date('Y') )
                                    <?php $sales += $order->tips; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                                <th>
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if( $order->status == 1 )
                                    <?php $sales += $order->cash_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if( $order->status == 1 )
                                    <?php $sales += $order->card_pay; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                    /
                                    <?php $sales = 0; ?>
                                    @foreach($orders as $order)
                                    @if( $order->status == 1 )
                                    <?php $sales += $order->tips; ?>
                                    @endif
                                    @endforeach
                                    &pound; {{$sales}}
                                </th>
                            </tr>
                            <tr>
                                <th>Most Sold Items:</th>
                                <th>
                                    @if(count(DB::table('order_items')->where('created_at', 'like', '%'.date('Y-m-d').'%')->get()) > 0)
                                    {{ DB::table('food_items')->find(
                                        DB::table('order_items')
                                        ->select('item_id', DB::raw('COUNT(id) as cnt', 'item_id'))
                                        ->where('created_at', 'like', '%'.date('Y-m-d').'%')
                                        ->groupBy('item_id')
                                        ->orderBy('cnt', 'DESC')
                                        ->first()
                                        ->item_id)->food_name
                                    }}
                                    @endif
                                </th>
                                <th>
                                    {{-- weekly most sold items --}}
                                    @if(count(DB::table('order_items')->where('created_at', 'like', '%'.date('Y-m').'%')->get()) > 0)
                                    {{ DB::table('food_items')->find(
                                        DB::table('order_items')
                                        ->select('item_id', DB::raw('COUNT(id) as cnt', 'item_id'))
                                        ->where('created_at', 'like', '%'.date('Y-m').'%')
                                        ->groupBy('item_id')
                                        ->orderBy('cnt', 'DESC')
                                        ->first()
                                        ->item_id)->food_name
                                    }}
                                    @endif
                                </th>
                                <th>
                                    @if(count(DB::table('order_items')->where('created_at', 'like', '%'.date('Y-m').'%')->get()) > 0)
                                    {{ DB::table('food_items')->find(
                                        DB::table('order_items')
                                        ->select('item_id', DB::raw('COUNT(id) as cnt', 'item_id'))
                                        ->where('created_at', 'like', '%'.date('Y-m').'%')
                                        ->groupBy('item_id')
                                        ->orderBy('cnt', 'DESC')
                                        ->first()
                                        ->item_id)->food_name
                                    }}
                                    @endif
                                </th>
                                <th>
                                    @if(count(DB::table('order_items')->where('created_at', 'like', '%'.date('Y').'%')->get()) > 0)
                                    {{ DB::table('food_items')->find(
                                        DB::table('order_items')
                                        ->select('item_id', DB::raw('COUNT(id) as cnt', 'item_id'))
                                        ->where('created_at', 'like', '%'.date('Y').'%')
                                        ->groupBy('item_id')
                                        ->orderBy('cnt', 'DESC')
                                        ->first()
                                        ->item_id)->food_name
                                    }}
                                    @endif
                                </th>
                                <th>
                                    @if(count(DB::table('order_items')->get()) > 0)
                                    {{ DB::table('food_items')->find(
                                        DB::table('order_items')
                                        ->select('item_id', DB::raw('COUNT(id) as cnt', 'item_id'))
                                        ->groupBy('item_id')
                                        ->orderBy('cnt', 'DESC')
                                        ->first()
                                        ->item_id)->food_name
                                    }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>Order:</th>
                                <th>
                                    {{-- daily order --}}
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d', strtotime($order->created_at)) == date('Y-m-d') )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:green" title="Paid">{{$odrs}}</span>
                                    /
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 0 && date('Y-m-d', strtotime($order->created_at)) == date('Y-m-d') )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:red" title="Unpaid">{{$odrs}}</span>
                                </th>
                                <th>
                                    {{-- weekly order --}}
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m-d') < date('Y-m-d', strtotime($order->created_at.'+6 days')) )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:green" title="Paid">{{$odrs}}</span>
                                    /
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 0 && date('Y-m-d') < date('Y-m-d', strtotime($order->created_at.'+6 days')) )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:red" title="Unpaid">{{$odrs}}</span>
                                </th>
                                <th>
                                    {{-- monthly order --}}
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y-m', strtotime($order->created_at)) == date('Y-m') )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:green" title="Paid">{{$odrs}}</span>
                                    /
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 0 && date('Y-m', strtotime($order->created_at)) == date('Y-m') )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:red" title="Unpaid">{{$odrs}}</span>
                                </th>
                                <th>
                                    {{-- Yearly orders --}}
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 && date('Y', strtotime($order->created_at)) == date('Y') )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:green" title="Paid">{{$odrs}}</span>
                                    /
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 0 && date('Y', strtotime($order->created_at)) == date('Y') )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:red" title="Unpaid">{{$odrs}}</span>
                                </th>
                                <th>
                                    {{-- all of orders --}}
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 1 )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:green" title="Paid">{{$odrs}}</span>
                                    /
                                    <?php $odrs = 0; ?>
                                    @foreach($orders as $order)
                                    @if($order->status == 0 )
                                    <?php $odrs += 1; ?>
                                    @endif
                                    @endforeach
                                    <span style="color:red" title="Unpaid">{{$odrs}}</span>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end content-->
        </div> <!--  end card  -->
    </div> <!-- end col-md-12 -->
</div> <!-- end row --> 
@endsection