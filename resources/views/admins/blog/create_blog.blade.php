@extends('admin')
@section('title', 'Add Blog')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">add</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Add Blog</h4>

                {!! Form::open(['route' => 'admin.create.blog', 'method' => 'POST', 'id' => 'RegisterValidation',
                'files' => true]) !!}

                <div class="row">
                    <div class=" col-md-12">
                        <div class="form-group label-floating">
                            {{ Form::label('title', 'Blog Title', ['class' => 'control-label container-label']) }}
                            {{ Form::text('title', null, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('sub_title', 'Sub Title', ['class' => 'control-label container-label']) }}
                            {{ Form::text('sub_title', null, ['class' => 'form-control border-input']) }}
                        </div>
                        <br>
                        <div class="">
                            {{ Form::label('image', 'Upload Image (Image Dimension: 570x298)', ['class' => '']) }}
                            {{ Form::file('image', ['class' => 'dropify','data-max-file-size'=>'3M','data-width'=>'400', 'style' => 'border-bottom:1px solid #ccc; padding:10px 5px']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{-- {{ Form::label('details', 'Details', ['class' => 'control-label container-label']) }}
                            --}}
                            {{ Form::textarea('details', null, ['class' => 'form-control border-input', 'rows' => 5]) }}
                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">add</i>
                            Add</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $('.dropify').dropify();
    CKEDITOR.replace( 'details' );
</script>
@endsection