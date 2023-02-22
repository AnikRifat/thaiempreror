@extends('admin')
@section('title', 'Email Promotion')
@section('content')

<div class="row">
        <div class="col-md-10">
            <div class="card">

                {{ Form::open(['route' => 'admin.email.promotion', 'method' => 'POST', 'id' => 'RegisterValidation']) }}
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">email</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Email Promotion</h4>

                        <div class="col-md-12">
                            <div class="form-group label-floating">                                
                                {{ Form::label('email', 'Subject', ['class' => 'control-label']) }}
                                {{ Form::text('subject', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('message', 'Message', ['class' => 'control-label']) }}
                                {{ Form::textarea('message', null, ['class' => 'form-control border-input', 'rows' => '10']) }}
                            </div>

                            <div class="form-footer text-right">
                                {{ Form::hidden('ticket_id', 1) }}
                            <button type="submit" class="btn btn-primary btn-fill">Send</button>
                        </div>
                        </div>
                        
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection