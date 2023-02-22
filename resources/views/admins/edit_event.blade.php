@extends('admin')
@section('title', 'Edit Event')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Event</h4>

                    {!! Form::model($event, ['route' => ['admin.update.event', $event->id], 'method' => 'PUT', 'id' => 'RegisterValidation', 'files' => true]) !!}

                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group label-floating">
                                {{ Form::label('title', 'Event Title', ['class' => 'control-label container-label']) }}
                                {{ Form::text('title', $event->title, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">
                                {{ Form::label('sub_title', 'Sub Title', ['class' => 'control-label container-label']) }}
                                {{ Form::text('sub_title', $event->sub_title, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">
                                {{ Form::label('footer_text', 'Footer Text', ['class' => 'control-label container-label']) }}
                                {{ Form::text('footer_text', $event->footer_text, ['class' => 'form-control border-input']) }}
                            </div><br>
                            <div class="">
                                {{ Form::label('image', 'Upload Image (Image Dimension: 570x298)', ['class' => '']) }}
                                {{ Form::file('image', ['class' => '', 'style' => 'border-bottom:1px solid #ccc; padding:10px 5px;width:100%']) }}
                            </div>
                            <div class="form-group">
                                <label> <input type="radio" class="" name="status" value="1" {{$event->status == 1? 'checked':''}}> Active &nbsp;</label>
                                <label> <input type="radio" class="" name="status" value="0" {{$event->status == 0? 'checked':''}}> Deactive</label>
                            </div><br>
                            <div class="form-group label-floating">
                                {{ Form::label('details', 'Details', ['class' => 'control-label container-label']) }}
                                {{ Form::textarea('details', $event->details, ['class' => 'form-control border-input', 'rows' => 5]) }}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">update</i> update</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>

@endsection

