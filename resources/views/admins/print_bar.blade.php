@extends('print')
@section('title', 'Print Bar')
@section('content')

@if(empty($order))

<div class="col-md-6 col-md-offset-3">
	<div class="card content text-center">
	<h3>No tickets are available.</h3>
	<h5>
		<p style="padding-left: 40px;padding-right: 40px;">Payment is not completed.</p>
		<a href="#" onclick="window.close()">Back to the order</a>
	</h5>
	</div>
</div>

@else

<div style="position: fixed;left:0;right:0;margin:auto;top: 5px;border: 2px solid #b54cf7;width: 74px;text-transform: uppercase;border-radius: 3px;font-weight: bold;" class="print">
	<a href="#" onclick="printDiv()">
		<i class="material-icons">print</i> Print
	</a>
</div>
<br>
<style type="text/css" media="print">
@media print {
    a[href]:after {
        content: none !important;
    }
}
</style>

<div class="ticket-area" id="table" name="table" style="margin:25px auto; width:85mm;font-size:15px;font-family:'Lucida Console'">
	<div class="row">
		<div class="ticket-padding">

	        <div class="col-md-12" style="text-align:center">
                <h4>{{config('app.name')}}</h4>
                <span style="font-size:18px"><b>Bar Copy</b></span><br>
                Order:<b>{{ $order->id }}</b>,Type: <b>{{$order->order_type}}</b><br>
                Time,Date:<b>{{date('h:ia,d M Y', strtotime($order->created_at))}}</b><br>
                @if($order->created_by == 0)
                <b>Online Order</b>
                @else
                Order received by: <b>{{$order->adm_first_name.' '.$order->adm_last_name}}</b>
                @endif
                <br><br>
            </div>
            
        	<div class="col-md-12">
                @if($order->order_type == 'DINE IN')
                Table Number: <b>{{$order->table_no}}</b><br>
                Number Of Guest: <b>{{$order->guest}}</b>
                @else
                Customer: <b>{{$order->first_name.' '.$order->last_name}}</b><br>
                @endif
                <strong>Customer Comments:</strong> {{$order->note}}<br>
                <strong>Order Note:</strong> {{$order->details}}<br><br>
        	</div>

	        <div class="col-md-12">
				<div class="table-responsive">
		            <table class="table table-bordered" style="font-size:16px">
		                <thead>
		                    <tr>
                                <th>Qty.</th>
                                <th>Item</th>
                            </tr>
		                </thead>
		                <tbody>
		                	@foreach($cats as $cat)
                            <tr>
                                <th></th>
                                <th colspan="4" style="text-align:left">{{$cat->cat_name}}</th>
                            </tr>

                            <!-- items print sub category wise -->
                            @foreach(DB::table('order_items')->leftJoin('food_sub_cats', 'food_sub_cats.id', 'order_items.sub_cat_id')->where('order_items.cat_id', $cat->cat_id)->where('order_items.order_id', $order->id)->whereNotNull('order_items.sub_cat_id')->select('order_items.sub_cat_id','food_sub_cats.sub_cat_name')->groupBy('order_items.sub_cat_id','food_sub_cats.sub_cat_name')->get() as $subcat)
                            {{-- <tr>
                                <td colspan="5" style="text-align:left; padding:5px!important">&nbsp; &nbsp; <b>{{$subcat->sub_cat_name}}:</b></td>
                            </tr> --}}

                            @foreach(DB::table('order_items')->orderBy('item_id', 'ASC')->where('sub_cat_id', $subcat->sub_cat_id)->where('order_id', $order->id)->whereNotNull('sub_cat_id')->get() as $food)
                            <tr>
                                <td>{{ $food->item_qty }}</td>
                                <td style="text-align:left">{{ $food->item_name }}</td>
                            </tr>
                            @if(!empty($food->remarks))
                            <tr>
                                <td></td>
                                <td style="font-size:18px">({{$food->remarks}})</td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach

                            @foreach(DB::table('order_items')->orderBy('item_id', 'ASC')->where('cat_id', $cat->cat_id)->where('order_id', $order->id)->whereNull('sub_cat_id')->get() as $food)
                            <tr>
                                <td>{{ $food->item_qty }}</td>
                                <td style="text-align:left">{{ $food->item_name }}</td>
                            </tr>
                            @if(!empty($food->remarks))
                            <tr>
                                <td></td>
                                <td style="font-size:18px">({{$food->remarks}})</td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                                        
		                </tbody>
		            </table>
		        </div>
	        </div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function printDiv() {
        var divToPrint = document.getElementById('table');
        var htmlToPrint = '' +
            '<style type="text/css">' +
            '.pageheader{font-size:14px}'+
            'table { border-collapse:collapse; font-size:16px; width:100%}' +
            'table th, table td { border:1px solid #666; padding: 5px;font-size:22px}' +
            '</style>';
        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
    }
    // setTimeout(function(){
    //     printDiv();
    // }, 1000);
</script>

@endif

@endsection