@extends('print')
@section('title', 'Print Customer Address')
@section('content')

<style type="text/css" media="print">
@media print {
    a[href]:after { content: none !important; }
}
</style>
<style type="text/css">
    .table tr td, .table tr th {text-align: left!important;padding: 5px!important;}
</style> 

@if(count($users) == 0)

<div class="col-md-6 col-md-offset-3">
	<div class="card content text-center">
	<h3>No addresses are available.</h3>
	<h5>
		<a href="#" onclick="window.close()">Back to the order details</a>
	</h5>
	</div>
</div>

@else

<div style="position: fixed;left:0;right:0;margin:auto;top: 5px;border: 2px solid #b54cf7;width: 74px;text-transform: uppercase;border-radius: 3px;font-weight: bold;z-index:999" class="print">
	<a href="#" onclick="printDiv()">
		<i class="material-icons">print</i> Print
	</a>
</div>

<br>

<div id="table" name="table" style="margin:10px auto; width:8.2in; background:#fff;">
		<div class="table" style="display:table"><br>
			<?php $r = 1; ?>
			@foreach($users as $user)
			@if($user->property_no != "")
			<div style="width:33%; display:table; float:left;">
				<table class="table table-bordered" style="width:90%; font-size:16px; text-align:left!important;margin-left:15px!important;margin-bottom:15px;margin-top:10px">
					<tr>
                		<th>{{$user->first_name.' '.$user->last_name}}</th>
                	</tr>
                	<tr>
                		<th>{{$user->property_no}}</th>
                	</tr>
                	<tr>
                		<th>{{$user->town_name}}</th>
                	</tr>
                	<tr>
                		<th>{{$user->post_code}}</th>
                	</tr>
                </table>
            </div>
            @endif
            <?php $r++; ?>
            @endforeach
        </div>
	</div>


<script type="text/javascript">
        function printDiv() {
        var divToPrint = document.getElementById('table');
        var htmlToPrint = '' +
            '<style type="text/css">' +
            '.pageheader{font-size:11px}'+
            'table { border-collapse:collapse; font-size:11px;}' +
            'table th, table td { border:1px solid #000;padding:5px}' +
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