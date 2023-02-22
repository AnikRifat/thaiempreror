@extends('admin')
@section('title', 'Edit Food Sub Category')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Food Sub Category <a href="/admin/view_sub_categories" class="btn btn-info pull-right">View Sub-Categories</a></h4>

                    {!! Form::model($subcat, ['route' => ['admin.update.sub.category', $subcat->id], 'method' => 'PUT', 'id' => 'RegisterValidation']) !!}

                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group label-floating">                                
                                {{ Form::label('cat_id', 'Category', ['class' => 'control-label container-label']) }}
                                <select name="cat_id" id="" class="form-control">
                                    <option value=""></option>
                                    @foreach($cats as $cat)
                                    <option value="{{$cat->id}}" {{($cat->id == $subcat->cat_id? 'selected':'')}}>{{$cat->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('sub_cat_id', 'Sub-Category Id', ['class' => 'control-label container-label']) }}
                                {{ Form::text('sub_cat_id', $subcat->sub_cat_id, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('sub_cat_name', 'Food Sub Category Name', ['class' => 'control-label container-label']) }}
                                {{ Form::text('sub_cat_name', $subcat->sub_cat_name, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('sub_cat_slug', 'Food Sub-Category Slug', ['class' => 'control-label container-label']) }}
                                {{ Form::text('sub_cat_slug', $subcat->sub_cat_slug, ['class' => 'form-control border-input', 'title' => $subcat->sub_cat_slug]) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('details', 'Details', ['class' => 'control-label container-label']) }}
                                {{ Form::textarea('details', $subcat->details, ['class' => 'form-control border-input', 'rows' => 5]) }}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">update</i></button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>

@endsection

