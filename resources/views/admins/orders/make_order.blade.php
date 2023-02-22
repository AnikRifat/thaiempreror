@extends('admin')
@section('title', 'Make a Order')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Make a Order</h4>

                    {!! Form::open(['route' => 'admin.make.order', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}

                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group label-floating">
                                {{ Form::label('order_type', 'Order Type', ['class' => 'control-label']) }}
                                {{ Form::select('order_type', ['' => '', 'DELIVERY' => 'DELIVERY', 'TAKE OUT' => 'TAKE OUT', 'DINE IN' => 'DINE IN', ], null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('contact_no', 'Contact No', ['class' => 'control-label container-label']) }}
                                {{ Form::text('contact_no', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Next <i class="material-icons">arrow_forward</i></button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>

@endsection

