@extends('admin')
@section('title', 'Add Food Category')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Add Food Category</h4>

                    {!! Form::open(['route' => 'admin.create.category', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}

                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group label-floating">                                
                                {{ Form::label('cat_id', 'Category Id', ['class' => 'control-label container-label']) }}
                                {{ Form::text('cat_id', null, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('food_cat_name', 'Food Category Name', ['class' => 'control-label container-label']) }}
                                {{ Form::text('food_cat_name', null, ['class' => 'form-control border-input', 'required' => '']) }}
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

