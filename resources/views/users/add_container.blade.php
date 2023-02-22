@extends('user')
@section('title', 'Add Container')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <div class="col-md-5">
                        <h4 class="card-title">Add Container</h4>
                    </div>
                    
                    <div class="col-md-5">
                        <h4 align="center" class="text-success text-right">Container of BOL: <b>{{ $bol->bol_number }}</b></h4>
                    </div>

                    {!! Form::open(['route' => 'add.container', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}

                    <div class="row">
                        <div class=" col-md-5">
                            <div class="form-group label-floating">                                
                                {{ Form::label('container', 'Container Number', ['class' => 'control-label container-label']) }}
                                {{ Form::text('container', null, ['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <div class="form-group label-floating">                                
                                {{ Form::label('size', 'Size', ['class' => 'control-label container-label']) }}
                                {{ Form::text('size', null, ['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            {{ Form::hidden('bol_id', $bol->id) }}
                            {{ Form::hidden('work_order_id', $bol->work_order_id) }}
                            <button type="submit" class="btn btn-rose btn-fill btn-container float-right"><i class="material-icons">add</i> Add</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    
                    <div class="row container-table">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-primary">
                                        <th>Container Number</th>
                                        <th>Trailer Size</th>
                                        <th class="text-primary text-right">Action</th>
                                    </thead>
                                    <tbody>

                                        @foreach($containers as $container)
                                        <tr>
                                            <td>{{ $container->container }}</td>
                                            <td>{{ $container->size }}</td>
                                            <td class="text-right">
                                                <a href="/edit_container/{{ $container->id }}" class="text-warning" title="Edit the record"><i class="material-icons">edit</i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a  class="btn btn-rose btn-fill pull-right" href="/work_order_details/{{ $bol->work_order_id }}">Back to Work Order</a>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

