@extends('admin')
@section('title', 'Add Event')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Add Event</h4>

                    {!! Form::open(['route' => 'admin.create.event', 'method' => 'POST', 'id' => 'RegisterValidation', 'files' => true]) !!}

                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group label-floating">
                                {{ Form::label('title', 'Event Title', ['class' => 'control-label container-label']) }}
                                {{ Form::text('title', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">
                                {{ Form::label('sub_title', 'Sub Title', ['class' => 'control-label container-label']) }}
                                {{ Form::text('sub_title', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">
                                {{ Form::label('footer_text', 'Footer Text', ['class' => 'control-label container-label']) }}
                                {{ Form::text('footer_text', null, ['class' => 'form-control border-input']) }}
                            </div><br>
                            <div class="">
                                {{ Form::label('image', 'Upload Image (Image Dimension: 570x298)', ['class' => '']) }}
                                {{ Form::file('image', ['class' => '', 'style' => 'border-bottom:1px solid #ccc; padding:10px 5px;width:100%']) }}
                            </div>
                            <div class="form-group label-floating">
                                {{ Form::label('details', 'Details', ['class' => 'control-label container-label']) }}
                                {{ Form::textarea('details', null, ['class' => 'form-control border-input', 'rows' => 5]) }}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">add</i> Add</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>

@endsection

