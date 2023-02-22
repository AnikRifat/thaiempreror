@extends('print')
@section('title', 'Print Bill')
@section('content')

@if(empty($order))

<div class="col-md-6 col-md-offset-3">
	<div class="card content text-center">
	<h3>No order for print are available.</h3>
	<h5>
		<p style="padding-left: 40px;padding-right: 40px;">Payment is not completed.</p>
		<a href="#" onclick="window.close()">Back to the order</a>
	</h5>
	</div>
</div>

@else

<div style="position: fixed; left:0; right: 0; margin:auto; top: 5px;border: 2px solid #b54cf7;width: 74px;text-transform: uppercase;border-radius: 3px;font-weight: bold;" class="print">
	<a href="#" onclick="printDiv();"><i class="material-icons">print</i> print</a>
</div>

<br>
<style type="text/css" media="print">
@media print {
    a[href]:after {
        content: none !important;
    }
}
</style>
<style type="text/css">
	table{font-size: 12px;}
	table tr th{font-size: 12px!important;padding: 5px !important;}
	table tr td{font-size: 11px!important;padding: 3px !important;}
</style>
<div class="ticket-area" id="table" name="table" style="margin:25px auto;font-size:16px; width:305px;color:#000;font-family:'Lucida Console'">
	<div class="row">
		<div class="ticket-padding">
				<div style="text-align:center; padding-top:5px;">
					<!--b style="font-size:17px">NAMASTE SWANLEY</b><br-->
					<img src="/images/logo-print.jpg" style="max-width:230px;margin-bottom:10px"><br>
					<span style="font-size:15px;">
					01322 836 121 / 01322 836 164<br>
					9 High Street, Swanley Kent, <br>BR8 8AE<br>
					{{config('app.url')}}<br>
                    Facebook: {{config('app.name')}}
					</span>
				</div><hr style="margin:5px 0">
				@if($order->order_type == 'HOME DELIVERY' || $order->order_type == 'TAKE AWAY')
				Customer: <b>{{ $order->first_name.' '.$order->last_name }}</b><br>
					Contact no: {{$order->primary_phone}}<br>
                    @if($order->order_type == 'HOME DELIVERY')
					Address: {{$order->property_no.', '.$order->town_name.', '.$order->post_code}}
                    @endif
                    <br><br>
                    <span style="font-size:16px">Comment: {{$order->details}}</span><br>
                    <span style="font-size:12px">
                        @foreach(DB::table('order_items')->leftJoin('food_items', 'order_items.item_id', 'food_items.id')->where('order_items.order_id', $order->id)->select('order_items.remarks', 'food_items.food_name')->get() as $icomn)
                        {{!empty($icomn->remarks)?$icomn->food_name.': '.$icomn->remarks.', ':''}}
                        @endforeach
                    </span>
				@elseif($order->order_type == 'DINE IN')
				Table Number: <b>{{$order->table_no}}</b><br>
				Number of Guest: <b>{{$order->guest}}</b>
				@endif
                <br>
				<div class="table-responsive">
		            <table class="table table-bordered" style="padding:0px;font-size:17px;width:303px;">
		                <thead>
		                    <tr>
                                <th>Item</th>
                                <th>Unit Price</th>
                                <th>Qty.</th>
                                <th>Price</th>
                            </tr>
		                </thead>
		                <tbody>
		                	@foreach($cats as $cat)
                            <tr>
                                <th colspan="4" style="text-align:left">{{$cat->cat_name}}</th>
                            </tr>
                            <!-- items print sub category wise -->
                            @foreach(DB::table('order_items')->leftJoin('food_sub_cats', 'food_sub_cats.id', 'order_items.sub_cat_id')->where('order_items.cat_id', $cat->cat_id)->where('order_items.order_id', $order->id)->whereNotNull('order_items.sub_cat_id')->select('order_items.sub_cat_id','food_sub_cats.sub_cat_name')->groupBy('order_items.sub_cat_id','food_sub_cats.sub_cat_name')->get() as $subcat)
                            {{-- 
                            <tr>
                                <td colspan="4" style="text-align:left; padding:5px!important">&nbsp; &nbsp; <b>{{$subcat->sub_cat_name}}:</b></td>
                            </tr> --}}

                            @foreach(DB::table('order_items')->orderBy('item_id', 'ASC')->where('sub_cat_id', $subcat->sub_cat_id)->where('order_id', $order->id)->whereNotNull('sub_cat_id')->get() as $food)
                            <tr>
                                <td style="word-wrap: break-all;">{{ $food->item_name }}</td>
                                <td>&pound;{{ $food->unit_price }}</td>
                                <td>{{ $food->item_qty }}</td>
                                <td>&pound;{{ $food->item_price }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        {{-- End sub cats foreach --}}

                            @foreach(DB::table('order_items')->orderBy('item_id', 'ASC')->where('cat_id', $cat->cat_id)->where('order_id', $order->id)->whereNull('sub_cat_id')->get() as $food)
                            <tr>
                                <td style="word-wrap: break-all;">{{ $food->item_name }}</td>
                                <td>&pound;{{ $food->unit_price }}</td>
                                <td>{{ $food->item_qty }}</td>
                                <td>&pound;{{ $food->item_price }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                            <tr>
                                <th colspan="2" style="text-align:right">Total Due = </th>
                                <th colspan="2">&pound;{{ $order->price }}</th>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:right">Discount % = </th>
                                <th colspan="2">{{$order->discount}}% &pound;{{ $dicvalue = number_format($order->price*$order->discount/100,2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:right">Total Amount = </th>
                                <th colspan="2">&pound;{{ number_format($order->price-$dicvalue,2) }}</th>
                            </tr>
		                </tbody>
		            </table>
		        </div>
		        <p>
                    <span>Order No. <b>{{$order->id}}</b></span><br>
                    Order Type: <b>{{$order->order_type}}</b> <br>
		        	Time,Date:{{date('h:i M d Y', strtotime($order->created_at))}}</p>
		        	<hr style="padding:0; margin:0">
		        <p align="center" style="font-size:18px">Thank you for choosing <br>Namaste Swanley!</p>
        </div>
    </div>
</div>

<script type="text/javascript">
        function printDiv() {
        var divToPrint = document.getElementById('table');
        var htmlToPrint = '' +
            '<style type="text/css">' +
            '.pageheader{font-size:12px}'+
            'table{ border-collapse:collapse; font-size:16px; width:303px;color:#000}' +
            'table th, table td{ border:1px solid #666; padding: 5px;font-size:17px}' +
            '</style>';
        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
    }
    // setTimeout(function(){
    //     printDiv();
    //     // window.close();
    // }, 1000);
    </script>

@endif

@endsection