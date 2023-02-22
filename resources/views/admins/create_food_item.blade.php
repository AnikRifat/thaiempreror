@extends('admin')
@section('title', 'Add Food Item')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            
            {!! Form::open(['route' => 'admin.create.food.item', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Add Food Item</h4>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            {{ Form::label('cat_id', '--- Food Category ---', ['class' => 'control-label']) }}
                            <select name="cat_id" class="form-control border-input" required>
                                <option value=""></option>
                                    @foreach($cats as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group label-floating">
                            {{ Form::label('sub_cat_id', '--- Food Sub-category ---', ['class' => 'control-label']) }}
                            <select name="sub_cat_id" class="form-control border-input">
                                <option value=""></option>
                                    @foreach($subcats as $subcat)
                                    <option value="{{ $subcat->id }}">{{ $subcat->sub_cat_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('food_name', 'Food Name', ['class' => 'control-label']) }}
                            {{ Form::text('food_name', null, ['class' => 'form-control border-input', 'required' => '']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('price', 'Food Price', ['class' => 'control-label']) }}
                            {{ Form::text('price', null, ['class' => 'form-control border-input', 'required' => '']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('details', 'Note:', ['class' => 'control-label']) }}
                            {{ Form::textarea('details', null, ['class' => 'form-control border-input', 'rows' => '3']) }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-fill pull-right">Add</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('scripts')

@endsection