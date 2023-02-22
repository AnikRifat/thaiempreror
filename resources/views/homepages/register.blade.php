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

    {!! Form::open(['route' => 'user.account.create', 'method' => 'POST', 'files' => true, 'id' => 'RegisterValidation']) !!}
    <!--form ng-submit="register()"-->
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('services') && Session::has('payment_id'))

                <h4>Selected Package</h4>
                <div class="form-group label-floating">
                    {{ Form::label('package', '--- Packages ---', ['class' => 'control-label']) }}
                    <select ng-controller="regCtrl" ng-init="onPageLoad()" name="package" class="form-control border-input">
                        @foreach(session::get('services') as $service)
                            <option value="{{ $service->id }}">{{ $service->package.' '.$service->time_limit }}</option>
                        @endforeach
                    </select>              
                </div>
                <div class="form-group label-floating">
                    {{ Form::label('coverage_area', '--- Coverage Area ---', ['class' => 'control-label']) }}
                    <select name="coverage_area" class="form-control border-input">
                        <option value=""></option>
                            @foreach($coverages as $area)
                            <option value="{{ $area->id }}">{{ $area->station}}</option>
                            @endforeach
                    </select>
                </div>
                <input type="hidden" name="payment" value="{{ Session::get('payment_id') }}">
                @else
                <script> window.location.href = '{{url("/check_payment")}}'; </script>
                @endif
                <br>
                <h4>Personal Information</h4>
                <div class="form-group label-floating">
                    {{ Form::label('full_name', 'Your Full Name:', ['class' => 'control-label']) }}
                    {{ Form::text('full_name', null, ['class' => 'form-control'])}}
                </div>
                <!--div class="form-group label-floating">
                    {{ Form::label('last_name', 'Last Name:', ['class' => 'control-label']) }}
                    {{ Form::text('last_name', null, ['class' => 'form-control'])}}
                </div-->
                <div class="form-group label-floating">
                    {{ Form::label('contact', 'Mobile Number', ['class' => 'control-label']) }}
                    {{ Form::text('contact', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group label-floating">
                    {{ Form::label('contact_confirmation', 'Confirm Mobile Number', ['class' => 'control-label']) }}
                    {{ Form::text('contact_confirmation', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group label-floating">
                    {{ Form::label('email', 'Email Address(optional):', ['class' => 'control-label']) }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                </div>
                <!--
                <div class="form-group label-floating">
                    {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <div class="form-group label-floating">
                    {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>
            -->
            </div>
            <!--
            <div class="col-md-6">
                <div class="fileinput fileinput-new text-center pull-right" data-provides="fileinput" style="width:250px;">
                    <div class="fileinput-new thumbnail" style="width:160px;">
                        <img class="img-responsive" src="/images/avatar.png" alt="">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                        <span class="btn-round btn-rose btn-file btn-small">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="profile_image" />
                        </span>
                        <br />
                    </div>
                </div>
            </div>
        -->
        </div>
        <button type="submit" class="btn btn-rose pull-right">Register</button>
        <div class="clearfix"></div>
    <!--/form-->
    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection