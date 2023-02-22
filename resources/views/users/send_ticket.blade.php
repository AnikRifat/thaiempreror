@extends('user')
@section('title', 'Email Ticket')
@section('content')

<div class="row">
        <div class="col-md-8">
            <div class="card email-padding">

                {{ Form::open(['route' => 'email.ticket', 'method' => 'POST', 'id' => 'RegisterValidation']) }}
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">email</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Email Ticket</h4>

                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                
                                {{ Form::label('email', 'Email Address', ['class' => 'control-label']) }}
                                {{ Form::email('email', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-footer text-right">
                                {{ Form::hidden('ticket_id', $ticket->id) }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-rose btn-fill">Send Ticket</button>
                        </div>                        
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection