@extends('admin')
@section('title', 'Add New Customer')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Add New Customer</h4>

    {!! Form::open(['route' => 'admin.create.customer', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-4">
                <div class="fileinput fileinput-new text-center pull-right" data-provides="fileinput" style="width:250px; margin-top:20px;">
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
                <div class="clearfix"></div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('first_name', 'First Name:', ['class' => 'control-label']) }}
                            {{ Form::text('first_name', null, ['class' => 'form-control', 'required' =>''])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('last_name', 'Last Name:', ['class' => 'control-label']) }}
                            {{ Form::text('last_name', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('primary_phone', 'Primary Phone', ['class' => 'control-label']) }}
                            {{ Form::text('primary_phone', null, ['class' => 'form-control', 'required' =>'', 'maxlength' => 11, 'pattern'=>'^[0-9]*$']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('secondary_phone', 'Seondary Phone', ['class' => 'control-label']) }}
                            {{ Form::text('secondary_phone', null, ['class' => 'form-control', 'maxlength' => 11]) }}
                        </div>
                    </div>
                </div>
                    <div class="form-group label-floating">
                        {{ Form::label('email', 'Email Address:(optional)', ['class' => 'control-label']) }}
                        {{ Form::email('email', null, ['class' => 'form-control']) }}
                    </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group label-floating">
                    {{ Form::label('property_no', 'Property Number and Street Name', ['class' => 'control-label']) }}
                    {{ Form::text('property_no', null, ['class' => 'form-control', 'required' =>'']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    {{ Form::label('town_name', 'Town Name', ['class' => 'control-label']) }}
                    {{ Form::text('town_name', null, ['class' => 'form-control', 'required' =>'']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    {{ Form::label('post_code', 'Post Code', ['class' => 'control-label']) }}
                    {{ Form::text('post_code', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group label-floating">
                    {{ Form::label('note', 'Note:', ['class' => 'control-label']) }}
                    {{ Form::textarea('note', null, ['class' => 'form-control', 'rows' => '3']) }}
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Add Customer</button>
        <div class="clearfix"></div>
    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection