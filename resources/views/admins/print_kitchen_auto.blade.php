@extends('print')
@section('title', 'Print Kitchen')
@section('content')

@if(empty($order))

<div class="col-md-6 col-md-offset-3">
	<div class="card content text-center">
	<h3>Printing Document not available.</h3>
	<h5>
		{{-- <p style="padding-left: 40px;padding-right: 40px;">Payment is not completed.</p> --}}
		<a href="/view_orders">Back to the order page</a>
	</h5>
	</div>
</div>

@else

<div style="text-align:center" class="print">
	<a href="#" onclick="printDiv()"><i class="material-icons">print</i> Print</a>
    <br>
    <a href="/view_orders"><small>Back to the order page</small></a>
</div>
<br>
<style type="text/css" media="print">
@media print { a[href]:after {content: none !important;}}
</style>

<div class="ticket-area" id="table" name="table" style="margin:25px auto; width:85mm; font-size:15px;font-family:'Lucida Console'">
	<div class="row">
		<div class="ticket-padding">

	        <div class="col-md-12" style="text-align:center">
	        	<h4>{{config('app.name')}}</h4>
        		<span style="font-size:18px"><b>Kitchen Copy</b></span><br>
        		Order:<b>{{ $order->id }}</b>,Type:<b>{{$order->order_type}}</b><br>
                Time,Date:{{date('h:ia,d M Y', strtotime($order->created_at))}}<br>
                <span style="text-align:left!important">
                    @if($order->created_by == 0)
                    <b>Online Order</b>
                    @else
                    Order received by: <b>{{$order->adm_first_name.' '.$order->adm_last_name}}</b>
                    @endif
                </span><br><br>
        	</div>
            
        	<div class="col-md-12">
                @if($order->order_type == 'DINE IN')
                Table Number: <b>{{$order->table_no}}</b><br>
                Number Of Guest: <b>{{$order->guest}}</b>
                @else
                Customer: <b>{{$order->first_name.' '.$order->last_name}}</b><br>
                @endif
                <strong>Customer Comment:</strong> {{$order->note}}<br>
                <strong>Order Note:</strong> {{$order->details}}<br><br>
        	</div>

	        <div class="col-md-12">
				<div class="table-responsive">
		            <table class="table table-bordered" style="font-size:18px">
		                <thead>
		                    <tr>
                                <th style="width:30px">Qty.</th>
                                <th>Item</th>
                            </tr>
		                </thead>
		                <tbody>
		                	@foreach($cats as $cat)
                            <tr>
                                <th colspan="3" style="text-align:left">.</th>
                            </tr>

                            <!-- items print sub category wise -->
                            @foreach(DB::table('order_items')->leftJoin('food_sub_cats', 'food_sub_cats.id', 'order_items.sub_cat_id')->where('order_items.cat_id', $cat->cat_id)->where('order_items.order_id', $order->id)->whereNotNull('order_items.sub_cat_id')->select('order_items.sub_cat_id','food_sub_cats.sub_cat_name')->groupBy('order_items.sub_cat_id','food_sub_cats.sub_cat_name')->get() as $subcat)
                            {{-- <tr>
                                <td colspan="5" style="text-align:left; padding:5px!important">&nbsp; &nbsp; <b>{{$subcat->sub_cat_name}}:</b></td>
                            </tr> --}}

                            @foreach(DB::table('order_items')->orderBy('item_id', 'ASC')->where('sub_cat_id', $subcat->sub_cat_id)->where('order_id', $order->id)->whereNotNull('sub_cat_id')->get() as $food)
                            <tr>
                                <td style="text-align:center">{{ $food->item_qty }}</td>
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
                                <td style="text-align:center">{{ $food->item_qty }}</td>
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
            '.pageheader{font-size:12px}'+
            'table { border-collapse:collapse; font-size:12px; width:100%}' +
            'table th, table td { border:1px solid #000; padding: 5px;font-size:22px}' +
            '</style>';
        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
    }
    </script>

@endif

@endsection
@section('scripts')
<script type="text/javascript">
function quickPrint(){
    //check print able document
    setTimeout(function(){
        printDiv();
        //update the printing status
        printUpdate();
        setTimeout(function(){
            window.location.href = '/admin/print_kitchen_auto';
        }, 3000);
    }, 3000);
}
function checkPrintable(){
    //check print able document
    setTimeout(function(){
        printDiv();
        setTimeout(function(){
            window.location.href = '/admin/print_kitchen_auto';
        }, 30000);
    }, 5000);
}

function printUpdate(){
    $.ajax({
        url: 'feed/4',
        type: 'POST',
        data: "_METHOD=PUT&accessToken=63ce0fde",
        success: function(data) {
            console.log(data);
        }
    });
}
    
function ajaxCall(){
    $.ajax({
        type: 'GET',
        url: '/admin/get_recent_orders_for_print',
        success: function (data){
            var obj = JSON.parse(JSON.stringify(data));
            console.log(obj['success'].length);
            if(obj['success'].length > 1)
            {
                //call to the function
                quickPrint();
                firstCall();
            }else{                
                checkPrintable();
                firstCall();
            }
        },
        error: function (data){
            console.log('ajax not working!');
        }
    });
}
// ajaxCall();

function firstCall(){
    setTimeout(function(){
        ajaxCall();
    }, 5000);
}
function secondCall(){
    //
}
firstCall();
</script>
@endsection