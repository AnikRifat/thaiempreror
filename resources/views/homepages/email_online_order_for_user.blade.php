<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />    
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Online Order</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />    
</head>
<body>
	<div style="background: #fff; border: 2px solid; margin: 0 auto 80px;width: 600px; padding:25px 35px;">
		<div style="margin-left: -15px;margin-right: -15px; overflow: hidden;">
			<div style="text-align:center">
				<h2>Namaste Swanley <br><span style="font-size:16px">Online Order</span></h2>
				<p>Your order has been received. Thank you for placing your order with Namaste Swanley.</p>
				<table style="width:100%;">
					<tr>
						<td style="text-align:left">
							Customer: {{$name}}<br>
							Phone: {{$phone}}<br>
							Email: {{$email}}<br>
							Address: {{$address}}<br>
							Message: {{$details}}<br><br>
						</td>
						<td style="text-align:right">
							Order Type: <strong>{{$order_type}}</strong><br>
							Order Time & Date: <strong>{{date('H:i d M Y')}}</strong>
						</td>
					</tr>
				</table>
				
			</div>
			
			<div style="">
				<div style="font-size:20px;text-align:center;font-weight:bold;margin-bottom:10px">Ordered Items</div>
				<table class="table" id="orders" style="border-collapse:collapse; border:1px solid $ddd;width:100%;">
		            <tr>
		              <th style="border:1px solid #000;padding:5px;">Item Name</th>
		              <th style="border:1px solid #000;padding:5px;width:80px">Item Price</th>
		              <th style="border:1px solid #000;padding:5px;width:40px">Qty</th>
		              <th style="border:1px solid #000;padding:5px;width:50px">Price</th>
		            </tr>

		            <?php $total_price = 0; ?>

					@foreach($orders as $order)		            
		            <tr>
		              <td style="border:1px solid #000;padding:5px;">{{$order->item_name}}</td>
		              <td style="border:1px solid #000;padding:5px;">&pound;{{$order->item_price}}</td>
		              <td style="border:1px solid #000;padding:5px;">{{$order->item_qty}}</td>
		              <td style="border:1px solid #000;padding:5px;">&pound;{{number_format($order->item_qty*$order->item_price, 2)}}</td>
		            </tr>
		            <?php
		            $total_price += number_format($order->item_qty*$order->item_price, 2);
		            ?>
		        	@endforeach
		            
		            <tr>
		              <th style="border:1px solid #000;padding:5px;text-align:right" colspan="3">Total Price = </th>
		              <th style="border:1px solid #000;padding:5px;" colspan="2">&pound;{{number_format($total_price, 2)}}</th>
		            </tr>
		          </table>
			</div>
		</div>
	</div>

</body>
</html>