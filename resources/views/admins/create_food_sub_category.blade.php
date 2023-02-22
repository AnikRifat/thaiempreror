@extends('admin')
@section('title', 'Add Food Sub Category')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Add Food Sub Category</h4>

                    {!! Form::open(['route' => 'admin.create.sub.category', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}

                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group label-floating">                                
                                {{ Form::label('cat_id', 'Category', ['class' => 'control-label container-label']) }}
                                <select name="cat_id" id="" class="form-control" required >
                                    <option value=""></option>
                                    @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('sub_cat_id', 'Sub-Category Id', ['class' => 'control-label container-label']) }}
                                {{ Form::text('sub_cat_id', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('food_sub_cat_name', 'Food Sub Category Name', ['class' => 'control-label container-label']) }}
                                {{ Form::text('food_sub_cat_name', null, ['class' => 'form-control border-input', 'required' => '']) }}
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

