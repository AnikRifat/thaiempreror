@extends('print')
@section('title', 'Print Ticket')
@section('content')

@if(count($tickets) == 0)

<div class="col-md-6 col-md-offset-3">
	<div class="card content text-center">
	<h3 style="color: red;">No tickets are available.</h3>
	<h5>
		<p style="padding-left: 40px;padding-right: 40px;">Please go back to container section of this Bill of Lading and try to add a new ticket under container. Only then you will be able to print ticket.</p>
		<a href="#" onclick="window.close()">Back to container section of this work order</a>
		<!--a class="text-small" href="/work_order_details/{{$worder->id}}"></a-->
	</h5>
	</div>
</div>

@else

<div style="position: fixed;right: 0;top: 5px;border: 2px solid #b54cf7;width: 74px;text-transform: uppercase;border-radius: 3px;font-weight: bold;" class="print">
	<a href="#" onclick="window.print()">
		<i class="material-icons">print</i> Print
	</a>
</div>

	@foreach($tickets as $ticket)

	<?php 
	$container = DB::table('containers')->find($ticket->container_id);
	$pickaddr = DB::table('addresses')->find($ticket->pick_addr_id);
	$deliaddr = DB::table('addresses')->find($ticket->deli_addr_id);
	?>

<div class="ticket-area">
	<div class="row">
		<div style="width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px; padding-left: 15px;">
			<img style="margin-left: 45px;margin-top: 15px;" src="http://cms.schaferlogistics.com/images/bwschaferlogo.gif" alt="Schafer Logistics Logo">
		</div>
		<div style="width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px; padding-left: 15px;">
			<p style="text-align: center;padding: 0;margin: 0;"><?php echo date('m/d/Y', time()	); ?> &nbsp; &nbsp;	
			<script type="text/javascript">
				<!--
				var currentTime = new Date()
				var hours = currentTime.getHours()
				var minutes = currentTime.getMinutes()
				if (minutes < 10){
				minutes = "0" + minutes
				}
				document.write(hours + ":" + minutes + " ")
				if(hours > 11){
				document.write("PM")
				} else {
				document.write("AM")
				}
				//-->
			</script>
			</p>
			<p style="font-weight: bold;margin: 0px; padding: 3px;border: 1px solid #333;text-align: center;">{{ $worder->id .' - '. $container->id. ' - ' .$ticket->ticket_number }}</p>
		</div>
		<div style="width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px; padding-left: 15px;">
			<div style="border-bottom: 2px solid #222;position: relative;">
				<h3 style="margin: 0;padding: 0;text-align: center;">{{ $container->container }}</h3>
				<p style="text-align: right;border: 1px solid #222;padding: 2px 8px 2px 8px;position: absolute;top: 5px;right: 20px;">{{ $ticket->ticket_number }}</p>
			</div>
			<div class="ticket-indicator-bottom">
				<h3 style="text-align: center;margin: 0;padding: 0;">{{ $ticket->state }}</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="ticket-padding">
			<div class="table-responsive table-space">
	            <table class="table table-bordered table-space">
	                <thead class="text-primary">
	                    <th style="margin: 0px; padding: 3px;">Account</th>
	                    <th style="margin: 0px; padding: 3px;">ID Container</th>
	                    <th style="margin: 0px; padding: 3px;">Work Order</th>
	                    <th style="margin: 0px; padding: 3px;">Bill of Lading</th>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td class="text-center" style="font-weight: bold;margin: 0px; padding: 3px;"><h4 style="margin: 0;padding: 0;">{{ $worder->client }}</h4></td>
	                        <td class="text-center" style="font-weight: bold;margin: 0px; padding: 3px;"><h4 style="margin: 0;padding: 0;">{{ $container->id }}</h4></td>
	                        <td class="text-center" style="font-weight: bold;margin: 0px; padding: 3px;"><h4 style="margin: 0;padding: 0;">{{ $worder->id }}</h4></td>
	                        <td class="text-center" style="font-weight: bold;margin: 0px; padding: 3px;"><h4 style="margin: 0;padding: 0;">{{ $bol->bol_number }}</h4></td>
	                    </tr>
	                    
	                </tbody>
	            </table>
	        </div>
        </div>
	</div>
	<div class="row">
		<div class="ticket-padding">
			<div class="table-responsive table-space">
	            <table class="table table-bordered table-space">
	                <thead class="text-primary">
	                    <th colspan="3" style="margin: 0px; padding: 3px;">Container Details</th>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td class="lekha-left">
	                        	<table class="table bottomless-table">
									<tbody>
										<tr>
											<td class="lekha-right"><b>Vessel:</b></td>
											<td class="lekha-left">{{$bol->vessel}}</td>
											<td class="lekha-right"><b>Chassis:</b></td>
											<td class="lekha-left">{{$container->chassis}}</td>
											<td class="lekha-right"><b>Adtl. BOL:</b></td>
											<td class="lekha-left">{{$container->add_bol1}}</td>											
											<td class="lekha-left">&nbsp;</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Unit Number:</b></td>
											<td class="lekha-left">{{ $container->container }}</td>
											<td class="lekha-right"><b>Trailer Size:</b></td>
											<td class="lekha-left">{{ $container->size }}</td>
											<td class="lekha-right"><b>Adtl. BOL:</b></td>
											<td class="lekha-left">{{$container->add_bol2}}</td>											
											<td class="lekha-left">&nbsp;</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Container Weight:</b></td>
											<td class="lekha-left">{{ $container->weight }}</td>
											<td class="lekha-right"><b>Reference #:</b></td>
											<td class="lekha-left">{{$container->reference}}</td>
											<td class="lekha-right"><b>Adtl. BOL:</b></td>
											<td class="lekha-left">{{$container->add_bol3}}</td>											
											<td class="lekha-left">&nbsp;</td>
										</tr>
									</tbody>
								</table>
	                        </td>
	                    </tr>
	                    
	                </tbody>
	            </table>
	        </div>
        </div>
	</div> <!--Container Detias End-->
	<div class="row">
		<div class="ticket-padding">
			<div class="table-responsive table-space">
	            <table class="table table-bordered table-space">
	                <thead class="text-primary">
	                    <th colspan="3" style="margin: 0px; padding: 3px;">Ticket Details</th>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td class="lekha-left">
	                        	<table class="table bottomless-table">
									<tbody>
										<tr>
											<td class="lekha-right"><b>Seal #:</b></td>
											<td class="lekha-left">{{ $container->seal }}</td>
											<td class="lekha-right"><b>Appt. Time:</b></td>
											<td class="lekha-left">{{ $ticket->appt_time }}</td>
											<td class="lekha-right"><b> Driver:</b></td>
											<td class="lekha-left">{{ $container->drive }}</td>
											<td class="lekha-left">&nbsp;</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Last Free Day:</b></td>
											<td class="lekha-left">{{ $ticket->last_free_day }}</td>
											<td class="lekha-right"><b>Unload Time:</b></td>
											<td class="lekha-left">{{ $ticket->unload_time }}</td>
											<td class="lekha-right"><b>Driver Wait:</b></td>
											<td class="lekha-left">{{ $ticket->driver_wait_time }}</td>
											<td class="lekha-left">&nbsp;</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Last Rec. Date:</b></td>
											<td class="lekha-left">{{ $ticket->last_rec_day }}</td>
											<td class="lekha-right"><b>Charges:</b></td>
											<td class="lekha-left">{{ $ticket->charges }}</td>
											<td class="lekha-right"><b>In Line:</b></td>
											<td class="lekha-left">{{ $ticket->in_line }}</td>
											<td class="lekha-right">&nbsp;</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>&nbsp;</b></td>
											<td class="lekha-left">&nbsp;</td>
											<td class="lekha-right"><b>Forklift Charges:</b></td>
											<td class="lekha-left">{{ $ticket->forklift_charge }}</td>
											<td class="lekha-right"><b>In Gate:</b></td>
											<td class="lekha-left">{{ $ticket->in_gate }}</td>
											<td class="lekha-right">&nbsp;</td>
										</tr>
										<tr>
											<td class="lekha-right">&nbsp;</td>
											<td class="lekha-left">&nbsp;</td>
											<td class="lekha-right"><b> Account Code:</b></td>
											<td class="lekha-left">{{ $ticket->account_code }}</td>
											<td class="lekha-right"><b> Exit:</b></td>
											<td class="lekha-left">{{ $ticket->exit_ticket }}</td>
											<td class="lekha-right">&nbsp;</td>
										</tr>
									</tbody>
								</table>
	                        </td>
	                    </tr>
	                    
	                </tbody>
	            </table>
	        </div>
        </div>
	</div> <!--Ticket Details End-->
	<div class="row">
		<div class="ticket-padding">
			<div class="table-responsive table-space">
	            <table class="table table-bordered table-space">
	                <thead class="text-primary">
	                    <th style="margin: 0px; padding: 3px;">Pickup Details</th>
	                    <th style="margin: 0px; padding: 3px;">Delivery Details</th>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td class="lekha-left">
	                        	<table class="table bottomless-table">
									<tbody>
										<tr>
											<td class="lekha-right"><b>Stop:</b></td>
											<td class="lekha-left">{{ $pickaddr->stop }}</td><b>
										</tr>
										<tr>
											<td class="lekha-right"><b>Contact:</b></td>
											<td class="lekha-left">{{ $pickaddr->stop }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Address:</b></td>
											<td class="lekha-left">{{ $pickaddr->address }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>City:</b></td>
											<td class="lekha-left">{{ $pickaddr->city }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>State:</b></td>
											<td class="lekha-left">{{ $pickaddr->state }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Zip:</b></td>
											<td class="lekha-left">{{ $pickaddr->zip }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Telephone:</b></td>
											<td class="lekha-left">{{ $pickaddr->contact }}</td>
										</tr>
									</tbody>
								</table>
	                        </td>
	                        <td class="lekha-left">
	                        	<table class="table bottomless-table">
									<tbody>
										<tr>
											<td class="lekha-right"><b>Stop:</b></td>
											<td class="lekha-left">{{ $deliaddr->stop }}</td><b>
										</tr>
										<tr>
											<td class="lekha-right"><b>Contact:</b></td>
											<td class="lekha-left">{{ $deliaddr->stop }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Address:</b></td>
											<td class="lekha-left">{{ $deliaddr->address }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>City:</b></td>
											<td class="lekha-left">{{ $deliaddr->city }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>State:</b></td>
											<td class="lekha-left">{{ $deliaddr->state }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Zip:</b></td>
											<td class="lekha-left">{{ $deliaddr->zip }}</td>
										</tr>
										<tr>
											<td class="lekha-right"><b>Telephone:</b></td>
											<td class="lekha-left">{{ $deliaddr->contact }}</td>
										</tr>
									</tbody>
								</table>
	                        </td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
        </div>
	</div><!--Pickup and Deliver End-->

	<div class="row">
		<div class="ticket-padding">
			<table class="table table-bordered table-space">
	                <thead class="text-primary">
	                </thead>
	                <tbody>
	                    <tr style="border: none">
	                        <td class="lekha-left" style="width: 50%;border: none;">
	                        	<table class="table bottomless-table">
									<tbody>
										<tr>
											<td style="width: 45%;text-align: right !important;border: none;"><b>Customer Signature:</b></td>
											<td class="lekha-left" style="border-top: none;"></td>
										</tr>
										<tr>
											<td class="lekha-right" style="border: none"><b>Date:</b></td>
											<td class="lekha-left"></td>
										</tr>
										<tr>
											<td class="lekha-left" style="border: none"><b>&nbsp;</b></td>
											<td class="lekha-left">&nbsp;</td>
										</tr>
										
									</tbody>
								</table>
	                        </td>
	                        <td class="lekha-left">
	                        	<table class="table bottomless-table">
									<tbody>
										<tr>
											<td class="lekha-right" style="width: 45%; border: none;"><b>Driver #:</b></td>
											<td class="lekha-left" style="border: none;"></td><b>
										</tr>
										<tr>
											<td class="lekha-right" style="width: 45%; border: none;"><b>Driver Signature:</b></td>
											<td class="lekha-left"></td>
										</tr>
										<tr>
											<td class="lekha-right" style="width: 45%; border: none;"><b>Date:</b></td>
											<td class="lekha-left"></td>
										</tr>
										
									</tbody>
								</table>
	                        </td>
	                    </tr>
	                </tbody>
	            </table>
        </div>
	</div> <!--Pickup and Deliver End-->
</div>

	@endforeach

	@endif

@endsection