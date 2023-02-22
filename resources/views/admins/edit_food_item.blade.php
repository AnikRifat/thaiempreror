@extends('admin')
@section('title', 'Edit Food Item')
@section('content')

<div class="row">
    <div class="col-md-10">
        <div class="card">
            
            {!! Form::model($food, ['route' => ['admin.update.food.item', $food->id], 'method' => 'PUT', 'id' => 'RegisterValidation', 'files' => true]) !!}
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Food Item <a href="/admin/view_food_items" class="btn btn-info pull-right">View Food Items</a></h4>

                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('cat_id', '--- Food Category ---', ['class' => 'control-label']) }}
                            <select name="cat_id" class="form-control border-input">
                                <option value=""></option>
                                    @foreach($cats as $cat)
                                    <option value="{{ $cat->id }}" {{$cat->id == $food->cat_id? 'selected':''}}>{{ $cat->cat_name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group label-floating">
                            {{ Form::label('sub_cat_id', '--- Food Sub-category ---', ['class' => 'control-label']) }}
                            <select name="sub_cat_id" class="form-control border-input">
                                <option value=""></option>
                                    @foreach($subcats as $subcat)
                                    <option value="{{ $subcat->id }}" {{$subcat->id == $food->sub_cat_id? 'selected':''}}>{{ $subcat->sub_cat_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('food_name', 'Food Name', ['class' => 'control-label']) }}
                            {{ Form::text('food_name', $food->food_name, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('price', 'Food Price', ['class' => 'control-label']) }}
                            {{ Form::text('price', $food->price, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">                                
                            {{ Form::label('food_type', 'Food Type', ['class' => 'control-label container-label']) }}
                            {{ Form::text('food_type', $food->food_type, ['class' => 'form-control border-input', 'title' => $food->food_type]) }}
                        </div>
                        <div class="form-group label-floating">                                
                            {{ Form::label('food_slug', 'Food Slug', ['class' => 'control-label container-label']) }}
                            {{ Form::text('food_slug', $food->food_slug, ['class' => 'form-control border-input', 'title' => $food->food_slug]) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <div class="fileinput fileinput-new text-center pull-right" data-provides="fileinput" style="width:250px;">
                                <div class="fileinput-new thumbnail" style="width:208px;">
                                    <img class="img-responsive" src="/images/{{($food->image)? 'items/'.$food->image : 'no_image.png' }}" alt="">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-sm btn-primary" style="top:0;left:0;">
                                        @if($food->image)
                                        <span class="fileinput-new">Change</span>
                                        @else
                                        <span class="fileinput-new">Add Photo</span>
                                        @endif
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="item_image" />
                                    </span>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group label-floating">                                
                            <label class="label">Active: <input type="checkbox" name="status" value="1" {{$food->status == 1?'checked':''}}></label>
                            <label class="label">For App: <input type="checkbox" name="for_app" value="1" {{$food->for_app == 1?'checked':''}}></label>
                            <label class="label">For Web: <input type="checkbox" name="for_web" value="1" {{$food->for_web == 1?'checked':''}}></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            {{ Form::label('details', 'Details:', ['class' => 'control-label']) }}
                            {{ Form::textarea('details', $food->details, ['class' => 'form-control border-input', 'rows' => '4']) }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-fill pull-right">
                        <i class="material-icons">update</i> Update
                    </button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@endsection