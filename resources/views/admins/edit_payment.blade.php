@extends('admin')
@section('title', 'Edit Payment')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <style type="text/css">
            .payment_calc input[type='text'] {
                text-align: center;
            }
            </style>
            
            {!! Form::model($order, ['route' => ['admin.update.payment', $order->id], 'method' => 'PUT', 'id' => 'RegisterValidation']) !!}
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content payment_calc">
                    <div class="col-md-12">
                        <div class="col-md-8">
                            <h4 class="card-title">
                                <b>Total due = &pound;<sapn id="tDue">{{$order->price}} </span></b>
                            </h4>
                            <p>Discounted price:<b>£<span id="discountedPrice"></span></b></p>
                        </div>
                        <div class="col-md-4">
                            <p style="font-size:14px">Returnable: <b><span id="returnable"></span></b><br><input id="receive" style="max-width:150px" placeholder="receive amount"></p>
                        </div>                        
                    </div>

                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('discount', 'Discount %', ['class' => 'control-label']) }}
                            {{ Form::text('discount', $order->discount, ['class' => 'form-control border-input', 'id' => 'discAmount']) }}
                        </div> 
                        <div class="form-group label-floating">
                            {{ Form::label('cash_pay', 'Cash Payment', ['class' => 'control-label']) }}
                            {{ Form::text('cash_pay', $order->cash_pay, ['class' => 'form-control border-input', 'id' => 'cash']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('card_pay', 'Card Payment', ['class' => 'control-label']) }}
                            {{ Form::text('card_pay', $order->card_pay, ['class' => 'form-control border-input', 'id' => 'card']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('tips', 'Tips', ['class' => 'control-label']) }}
                            {{ Form::text('tips', $order->tips, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('note', 'Notes', ['class' => 'control-label']) }}
                            {{ Form::textarea('note', $order->payment_note, ['class' => 'form-control border-input', 'rows' => '4']) }}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <a href="/admin/view_orders" class="btn btn pull-left"><i class="material-icons">arrow_back</i> back</a>
                    <button type="submit" class="btn btn-primary btn-fill pull-right"><i class="material-icons">update</i> update</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    <script type="text/javascript" src="{{'/js/payment_calculator.js'}}"></script>

@endsection