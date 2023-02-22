@extends('admin')
@section('title', 'Choose Order Option')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">arrow_forward</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Choose Order Option</h4>

                    {!! Form::open(['route' => 'admin.order.option', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}
                    <style type="text/css">
                    label.form-check-label{
                        width: 160px;
                        text-align: center;
                    }
                    </style>

                    <div class="row">
                        <div class=" col-md-12 checkbox-radios"><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label btn btn-info">
                                    <input class="form-check-input" name="order_type" value="HOME DELIVERY" type="radio"> HOME DELIVERY
                                    <span class="circle">
                                      <span class="check"></span>
                                    </span>
                                </label>&nbsp;&nbsp;&nbsp;
                                <label class="form-check-label btn btn-success">
                                    <input class="form-check-input" name="order_type" value="TAKE AWAY" type="radio"> TAKE AWAY
                                    <span class="circle">
                                      <span class="check"></span>
                                    </span>
                                </label>&nbsp;&nbsp;&nbsp;
                                <label class="form-check-label btn btn-warning">
                                    <input class="form-check-input" name="order_type" value="DINE IN" type="radio"> DINE IN
                                    <span class="circle">
                                      <span class="check"></span>
                                    </span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">arrow_forward</i> Next</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>

@endsection

