@extends('admin')
@section('title', 'Payment Receive')
@section('content')
    
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Payment Receive</h4>

                    {!! Form::open(['route' => 'admin.payment.receive', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <div class="form-selct">
                                    {{ Form::label('payment_method', 'Payment Method', ['class' => 'control-label']) }}
                                    <select name="payment_method" class="form-control border-input">
                                        <option value=""></option>

                                            @foreach($paymethods as $paymethod)
                                            <option value="{{ $paymethod->id }}">{{ $paymethod->payment_system }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group label-floating">                                
                                {{ Form::label('received_amount', 'Received Amount', ['class' => 'control-label container-label']) }}
                                {{ Form::text('received_amount', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('account_number', 'Account Number', ['class' => 'control-label container-label']) }}
                                {{ Form::text('account_number', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">
                                {{ Form::label('trxid', 'Transaction ID (TrxID)', ['class' => 'control-label container-label']) }}
                                {{ Form::text('trxid', null, ['class' => 'form-control border-input']) }}
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                {{ Form::label('detail', 'Details', ['class' => 'control-label']) }}
                                {{ Form::textarea('detail', null, ['class' => 'form-control border-input', 'rows' => '10']) }}
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rose btn-fill pull-right">Confirm</button> 
                    {!! Form::close() !!}
                                     
                </div>
            </div>
        </div>
    </div><!-- end row --> 
@endsection

@section('scripts')

@endsection