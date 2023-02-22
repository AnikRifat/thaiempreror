@extends('admin')
@section('title', 'Edit Blog')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">edit</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit Blog</h4>

                {!! Form::model($blog, ['route' => ['admin.update.blog', $blog->id], 'method' => 'PUT', 'id' =>
                'RegisterValidation', 'files' => true]) !!}

                <div class="row">
                    <div class=" col-md-12">
                        <div class="form-group label-floating">
                            {{ Form::label('title', 'Blog Title', ['class' => 'control-label container-label']) }}
                            {{ Form::text('title', $blog->title, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('sub_title', 'Sub Title', ['class' => 'control-label container-label']) }}
                            {{ Form::text('sub_title', $blog->sub_title, ['class' => 'form-control border-input']) }}
                        </div>
                        <br>
                        <div class="">
                            {{ Form::label('image', 'Upload Image (Image Dimension: 570x298)', ['class' => '']) }}
                            {{ Form::file('image', ['class' => 'dropify','data-default-file'=>'/images/home/'.$blog->image ,
                            'style' => 'border-bottom:1px solid #ccc; padding:10px 5px;width:100%']) }}
                        </div>
                        <div class="form-group">
                            <label> <input type="radio" class="" name="status" value="1" {{$blog->status == 1?
                                'checked':''}}> Active &nbsp;</label>
                            <label> <input type="radio" class="" name="status" value="0" {{$blog->status == 0?
                                'checked':''}}> Deactive</label>
                        </div><br>
                        <div class="form-group label-floating">

                            {{ Form::textarea('details', $blog->details, ['class' => 'form-control border-input', 'rows' => 5]) }}
                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">update</i>
                            update</button>
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