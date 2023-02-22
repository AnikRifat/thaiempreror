<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />    
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Print Ticket | Schafer Logistics</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />    
</head>
<body style="background: #eee;">
	<div style="background: #fff none repeat scroll 0 0; border-top: 1px solid; margin: 0 auto 80px;width: 960px; ">
	<div style="margin-left: -15px;margin-right: -15px; overflow: hidden;">
		<div style="min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;width: 28.3333%; float: left;">
			<img src="http://cms.schaferlogistics.com/images/bwschaferlogo.gif" alt="Schafer Logistics Logo" style="margin-left: 45px; margin-top: 15px;">
		</div>
		<div style="min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;width: 29.3333%; float: left;">
			<p style="margin: 0;padding: 0;text-align: center;"><?php echo date('m/d/Y', time()	); ?> &nbsp; &nbsp;	
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
			<p id="ticket-number" style="font-weight: bold;border: 1px solid #333;padding: 5px;text-align: center;">{{ $workorder->id .' - '. $container->id. ' - '.$ticket->ticket_number }}</p>
		</div>
		<div style="min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;width: 30.3333%; float: left;">
			<div style="border-bottom: 2px solid #222;position: relative;">
				<h3 style="margin: 0;padding: 0;text-align: center;">{{ $container->container }}</h3>
				<p style="border: 1px solid #222;width:10px; padding: 0 5px;position: absolute;right: 20px;text-align: right;top: -16px;">{{ $ticket->ticket_number }}</p>
			</div>
			<div>
				<h3 style="margin: 0;padding: 0;text-align: center;">{{ $ticket->state }}</h3>
			</div>
		</div>
	</div>
	<div style="margin-left: -15px;margin-right: -15px; overflow: hidden;">
		<div style="padding-left: 20px;padding-right: 20px;">
			<div style="margin-bottom: 20px;overflow: auto;min-height: 0.01%;overflow-x: auto;">
	            <table style="margin-bottom: 20px;border: 1px solid #ddd;max-width: 100%;width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;">
	                <thead style="color: #9c27b0;">
	                    <th style=" border-top: 0 none; padding: 12px 8px;text-align: center;vertical-align: middle;border-bottom-width: 1px;font-size: 1.25em;font-weight: 300;line-height: 0.429; background: #ccc none repeat scroll 0 0;">Account</th>
	                    <th style=" border-top: 0 none; padding: 12px 8px;text-align: center;vertical-align: middle;border-bottom-width: 1px;font-size: 1.25em;font-weight: 300;line-height: 0.429; background: #ccc none repeat scroll 0 0;">ID Container</th>
	                    <th style=" border-top: 0 none; padding: 12px 8px;text-align: center;vertical-align: middle;border-bottom-width: 1px;font-size: 1.25em;font-weight: 300;line-height: 0.429; background: #ccc none repeat scroll 0 0;">Work Order</th>
	                    <th style=" border-top: 0 none; padding: 12px 8px;text-align: center;vertical-align: middle;border-bottom-width: 1px;font-size: 1.25em;font-weight: 300;line-height: 0.429; background: #ccc none repeat scroll 0 0;">Bill of Lading</th>
	                </thead>
	                <tbody>
	                    <tr style="position: relative;">
	                        <td style="font-weight: bold;padding: 12px 8px;text-align: center;vertical-align: middle;border: 1px solid #ddd;line-height: 1.42857;"><h4>{{ $workorder->client }}</h4></td>
	                        <td style="font-weight: bold;padding: 12px 8px;text-align: center;vertical-align: middle;border: 1px solid #ddd;line-height: 1.42857;"><h4>{{ $container->id }}</h4></td>
	                        <td style="font-weight: bold;padding: 12px 8px;text-align: center;vertical-align: middle;border: 1px solid #ddd;line-height: 1.42857;"><h4>{{ $workorder->id }}</h4></td>
	                        <td style="font-weight: bold;padding: 12px 8px;text-align: center;vertical-align: middle;border: 1px solid #ddd;line-height: 1.42857;"><h4>{{ $bol->bol_number }}</h4></td>
	                    </tr>
	                    
	                </tbody>
	            </table>
	        </div>
        </div>
	</div>
	<div style="margin-left: -15px;margin-right: -15px; overflow: hidden;">
		<div style="padding-left: 20px;padding-right: 20px;">
			<div style="margin-bottom: 20px;overflow: auto;min-height: 0.01%;overflow-x: auto;">
	            <table style="margin-bottom: 20px;border: 1px solid #ddd;max-width: 100%;width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;">
	            	<thead style="color: #9c27b0;">
	                    <th colspan="3" style=" border-top: 0 none; padding: 12px 8px;text-align: center;vertical-align: middle;border-bottom-width: 1px;font-size: 1.25em;font-weight: 300;line-height: 0.429; background: #ccc none repeat scroll 0 0;">Container Details</th>
	                </thead>
	                <tbody>
	                    <tr style="position: relative;">
	                        <td style="font-weight: bold;padding: 12px 8px;text-align: center;vertical-align: middle;border: 1px solid #ddd;line-height: 1.42857;">
	                        	<table style="margin-bottom: 0;border: 1px solid #ddd;max-width: 100%;width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;">
									<tbody>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Vessel:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->vessel }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Chassis:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->chassis }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Adtl. BOL:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->add_bol1 }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Unit Number:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->container }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Trailer Size:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->size }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Adtl. BOL:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->add_bol2 }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Container Weight:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->weight }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Reference #:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->reference }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Adtl. BOL:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->add_bol3 }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
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
	<div style="margin-left: -15px;margin-right: -15px; overflow: hidden;">
		<div style="padding-left: 20px;padding-right: 20px;">
			<div style="margin-bottom: 20px;overflow: auto;min-height: 0.01%;overflow-x: auto;">
	            <table style="margin-bottom: 20px;border: 1px solid #ddd;max-width: 100%;width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;">
	                <thead style="color: #9c27b0;">
	                    <th colspan="3" style=" border-top: 0 none; padding: 12px 8px;text-align: center;vertical-align: middle;border-bottom-width: 1px;font-size: 1.25em;font-weight: 300;line-height: 0.429; background: #ccc none repeat scroll 0 0;">Ticket Details</th>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td style="text-align: left;">
	                        	<table style="margin-bottom: 0px;max-width: 100%;width: 100%;">
									<tbody style="text-align: center;line-height: 1.42857">
										<tr style="position: relative;">
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Seal #:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->seal }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Appt. Time:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->appt_time }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b> Driver:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $container->drive }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Last Free Day:</b></td>
											<td style="text-align:left;padding: 12px 0;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">{{ $ticket->last_free_day }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Unload Time:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->unload_time }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Driver Wait:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->driver_wait_time }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Last Rec. Date:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->last_rec_day }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Charges:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->charges }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>In Line:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->in_line }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>&nbsp;</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">&nbsp;</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Forklift Charges:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->forklift_charge }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>In Gate:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->in_gate }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">&nbsp;</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b> Account Code:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->account_code }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b> Exit:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $ticket->exit_ticket }}</td>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;">&nbsp;</td>
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
	<div style="margin-left: -15px;margin-right: -15px; overflow: hidden;">
		<div style="padding-left: 20px;padding-right: 20px;">
			<div style="margin-bottom: 20px;overflow: auto;min-height: 0.01%;overflow-x: auto;">
	            <table style="margin-bottom: 20px;border: 1px solid #ddd;max-width: 100%;width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;">
	                <thead style="color: #9c27b0;">
	                    <th style=" border-top: 0 none; padding: 12px 8px;text-align: center;vertical-align: middle;border-bottom-width: 1px;font-size: 1.25em;font-weight: 300;line-height: 0.429; background: #ccc none repeat scroll 0 0;">Pickup Details</th>
	                    <th style=" border-top: 0 none; padding: 12px 8px;text-align: center;vertical-align: middle;border-bottom-width: 1px;font-size: 1.25em;font-weight: 300;line-height: 0.429; background: #ccc none repeat scroll 0 0;">Delivery Details</th>
	                </thead>
	                <tbody style="line-height: 1.42857">
	                    <tr style="position: relative">
	                        <td>
	                        	<table style="margin-bottom:0px;border: 1px solid #ddd;max-width: 100%;width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;">
									<tbody>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Stop:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $pickaddr->stop }}</td><b>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Contact:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $pickaddr->stop }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Address:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $pickaddr->address }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>City:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $pickaddr->city }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>State:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $pickaddr->state }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Zip:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $pickaddr->zip }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Telephone:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $pickaddr->contact }}</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<table style="margin-bottom:0px;border: 1px solid #ddd;max-width: 100%;width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;">
									<tbody>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Stop:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $deliaddr->stop }}</td><b>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Contact:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $deliaddr->stop }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Address:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $deliaddr->address }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>City:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $deliaddr->city }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>State:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $deliaddr->city }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Zip:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $deliaddr->zip }}</td>
										</tr>
										<tr>
											<td style=" padding: 12px 8px;text-align: right;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;"><b>Telephone:</b></td>
											<td style=" padding: 12px 8px;text-align: left;vertical-align: middle;border-top: 1px solid #ddd;line-height: 0.42857;font-weight:normal;">{{ $deliaddr->contact }}</td>
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

	<div style="margin-left: -15px;margin-right: -15px; overflow: hidden;">
		<div style="padding-left: 20px;padding-right: 20px;">
			<table style="margin-bottom: 20px; border: 1px solid #ddd; max-width: 100%;width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;">
				<tbody>
						<tr>
							<td style="width:18%; padding:10px 0; text-align:right;"><b>Customer Signature: </b></td>
							<td style="width:23%; border-bottom:1px dotted #333;"></td>
							<td style="width:20%; text-align:right; border-left:1px solid #999;"><b>Driver #:</b></td>
							<td style="width:23%; border-bottom:1px dotted #333;"></td>
						</tr>
						<tr>
							<td style="padding:10px 0; text-align:right;"><b>Date:</b></td>							
							<td style="border-bottom:1px dotted #333;"></td>
							<td style=" text-align:right; border-left:1px solid #999;"><b>Driver Signature:</b></td>
							<td style="border-bottom:1px dotted #333;"></td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px 0;"></td>
							<td style=" text-align:right;padding:10px 0; border-left:1px solid #999;"><b>Date:</b></td>
							<td style="border-bottom:1px dotted #333;"></td>
						</tr>
						<tr><td colspan="4"></td></tr>
          </tbody>
      </table>
        </div>
	</div><!--Pickup and Deliver End-->

</div>

</body>
</html>