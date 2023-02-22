@extends('admin')
@section('title', 'Order Details')
@section('content')
<?php $admin = Auth::guard('admin')->user(); ?>
<div class="row">
				<div class="col-md-10">
						<div class="card">
								<div class="card-header card-header-icon" data-background-color="purple">
										<i class="material-icons">assignment</i>
								</div>
								<div class="card-content">
												<h4 class="card-title">Order Details</h4>
										<div class="toolbar pull-right">
												<a href="/admin/order/{{$order->id}}/edit" class="text-warning" title="Edit Order "><i class="material-icons">edit</i> Edit</a>&nbsp; &nbsp;  &nbsp;
												<a target="_blank" href="/admin/print_order/{{$order->id}}" class="text-success" title="Print Ticket "><i class="material-icons">print</i> Bill</a>&nbsp;
												@if($order->order_type == "HOME DELIVERY")
												{{-- <a target="_blank" href="/admin/print_addr/{{$order->id}}" class="text-primary" title="Print Ticket "><i class="material-icons">print</i> Address</a>&nbsp; --}}
												@endif
												<a target="_blank" href="/admin/print_kitchen/{{$order->id}}" class="text-info" title="Print Kitchen Copy"> <i class="material-icons">print</i> Kitchen</a>
												<a target="_blank" href="/admin/print_bar/{{$order->id}}" class="text-primary" title="Print Bar Copy"> <i class="material-icons">print</i> Bar</a>
										</div>

										<div class="row">
												<div class="clearifx"></div>
												<div class="col-md-12">                                
														<div class="card-content">
																<div class="table-responsive table-space">
																		<table class="table table-no-bordered">
																				<tr>
																						<td style="text-align:left">
																								@if($order->order_type == 'DINE IN')
																								Table Number: <b>{{$order->table_no}}</b><br>
																								Number of Guest: <b>{{$order->guest}}</b>
																								@else
																								Customer: <b> {{$order->first_name.' '.$order->last_name }}</b></b><br>
																								Contact: {{$order->primary_phone}}<br>
																								@if($order->order_type == 'HOME DELIVERY')
																								Address: {{$order->property_no.', '.$order->town_name.', '.$order->post_code}}
																								@endif
																								@endif
																						</td>
																						<td style="text-align:right">
																								<span>Order No. <b>{{$order->id}}</b></span><br>
																								Order type: <b>{{ $order->order_type }}</b><br>
																								Order Time & Date: <b>{{date('h:s:i - d M Y', strtotime($order->created_at))}}</b>
																						</td>
																				</tr>
																		</table>
																</div>

																<div class="table-responsive table-space">
																		<table class="table table-bordered">
																				<tr>
																						<th>Item</th>
																						<th>Unit Price</th>
																						<th>Qty.</th>
																						<th>Price</th>
																						<th>Remarks</th>
																				</tr>
																				@foreach($cats as $cat)
																				<tr>
																						<th colspan="5" style="text-align:left">{{$cat->cat_name}}</th>
																				</tr>

																				<!-- items print sub category wise -->
																				@foreach(DB::table('order_items')->leftJoin('food_sub_cats', 'food_sub_cats.id', 'order_items.sub_cat_id')->where('order_items.cat_id', $cat->cat_id)->where('order_items.order_id', $order->id)->whereNotNull('order_items.sub_cat_id')->select('order_items.sub_cat_id','food_sub_cats.sub_cat_name')->groupBy('order_items.sub_cat_id','food_sub_cats.sub_cat_name')->get() as $subcat)
																				<tr>
																						<td colspan="5" style="text-align:left; padding:5px!important">&nbsp; &nbsp; <b>{{$subcat->sub_cat_name}}:</b></td>
																				</tr>

																				@foreach(DB::table('order_items')->orderBy('item_id', 'ASC')->where('sub_cat_id', $subcat->sub_cat_id)->where('order_id', $order->id)->whereNotNull('sub_cat_id')->get() as $food)
																				<tr>
																						<td>{{ $food->item_name }}</td>
																						<td>&pound;{{ $food->unit_price }}</td>
																						<td>{{ $food->item_qty }}</td>
																						<td>&pound;{{ $food->item_price }}</td>
																						<td>{{ $food->remarks }}</td>
																				</tr>
																				@endforeach
																				@endforeach
																				<!-- sub cats end -->

																				@foreach(DB::table('order_items')->orderBy('item_id', 'ASC')->where('cat_id', $cat->cat_id)->where('order_id', $order->id)->whereNull('sub_cat_id')->get() as $food)
																				<tr>
																						<td>{{ $food->item_name }}</td>
																						<td>&pound;{{ $food->unit_price }}</td>
																						<td>{{ $food->item_qty }}</td>
																						<td>&pound;{{ $food->item_price }}</td>
																						<td>{{ $food->remarks }}</td>
																				</tr>
																				@endforeach
																				@endforeach

																				<tr>
																						<th colspan="3" style="text-align:right">Total = </th>
																						<th>&pound;{{ $order->price }}</th>
																						<th></th>
																				</tr>
																		</table>
																</div>

																<br>
																<h4>Order Status: 
																		@if($order->status == 0)
																		<span style="color: #f00";>Unpaid</span>
																		@elseif($order->status == 1)
																		<span style="color: #0a0";>Paid</span>
																		@elseif($order->status == 2)
																		<span style="color: #00f";>Cancel</span>
																		@endif

																</h4>

																<div class="table-responsive">
																		<table class="table table-bordered">
																				<tr>
																						<td style="text-align:left;width:200px;">
																								<b>Total Due: &pound;{{ $order->price }}</b><br>
																								Cash Pay: {{ $order->cash_pay?'&pound; '.$order->cash_pay:0 }}<br>
																								Card Pay: {{ $order->card_pay?'&pound; '.$order->card_pay:0 }}<br>
																								Discount: {{ $order->discount? $order->discount.' %':0 }}<br>
																								Tips: {{ $order->tips?'&pound; '.$order->tips:0 }}
																						</td>
																						<td style="text-align:left">
																								<b>Payment Note: </b> {{ $order->payment_note }}<hr>
																								<b>Customer Details: </b> {{ $order->note }}
																						</td>
																				</tr>
																				<tr>
																						<td colspan="2" style="text-align:left">
																								<b>Order Details: </b> <br>{{ $order->details }}
																						</td>
																				</tr>
																		</table>
																</div>
																<p>
																		@if($order->created_by == 0)
																		Order By: <b><a href="#">Online Order</a></b>
																		@else
																		Order Received By: <b>{{$order->adm_first_name.' '.$order->adm_last_name}}</b>
																		@endif
																</p>
														</div>
												</div>
										</div>
										
										<div class="col-md-12">
												<a href="/admin/view_orders" class="btn btn pull-left"><i class="material-icons">arrow_back</i> back</a>
												@if($order->status == 1)
												@if($admin->user_role == 'SUPER-ADMIN' || $admin->user_role == 'ADMIN')
												<a class="btn btn-warning pull-right" href="/admin/payment/{{$order->id}}/edit" title="Update Payment"><i class="material-icons">edit</i> edit payment</a>
												@endif
												@else
												<a href="/admin/order/{{$order->id}}/payment" class="btn btn-success pull-right" title="Get Payment"><i class="material-icons">payment</i> Get Payment</a>
												@endif
										</div>
								</div>
						</div>
				</div>
		</div><!-- end row --> 
@endsection