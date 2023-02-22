@extends('home')
@section('title', 'Register')
@section('content')
<div class="full-page login-page" filter-color="black" data-image="/images/login.jpg">
    <div class="content">
        <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Customer Registration</h4>

    {!! Form::open(['route' => 'check.package', 'method' => 'POST', 'files' => true, 'id' => 'RegisterValidation']) !!}
    <!--form ng-submit="register()"-->
        <div class="row">
            <div class="col-md-12">
                <h4>Package Selection</h4>

                <div class="form-group label-floating">
                    {{ Form::label('package', '--- Packages ---', ['class' => 'control-label']) }}
                    <select ng-controller="regCtrl" ng-init="onPageLoad()" name="package" class="form-control border-input">
                        <option value=""></option>
                        @foreach($packages as $package)
                            <option value="{{ $package->package }}">{{ $package->package }}</option>
                        @endforeach
                    </select>              
                </div>
                <div class="form-group label-floating">
                    {{ Form::label('time_limit', '--- Time Limit ---', ['class' => 'control-label']) }}
                    <select name="time_limit" class="form-control border-input">
                        <option value=""></option>
                            @foreach($limits as $limit)
                            <option value="{{ $limit->time_limit }}">{{ $limit->time_limit." ".$limit->suffix }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-rose pull-right">Check Package</button>
        <a class="btn btn-rose pull-left" href="/check_payment">Check Payment</a>
        <div class="clearfix"></div>
    <!--/form-->
    {!! Form::close() !!}
        </div>
        @if(!empty($service))

        <div class="col-md-12" style="background:#fdb">
            <h4>Please pay <b>{{ $service->price }}</b> taka for <b>{{ $service->package.' '.$service->time_limit }}</b> package to <b>bKash: 017 03 03 42 47</b> and collect <b>paid mobile number</b> and <b>trxID</b> from the message then go to check payment.</h4>
            
        </div>
        @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection