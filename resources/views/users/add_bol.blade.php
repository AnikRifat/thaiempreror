@extends('user')
@section('title', 'Add Bill of Lading')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            
            {!! Form::open(['route' => 'add.bol', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <div class="col-md-5">
                        <h4 class="card-title">Create BOL under this work order</h4>
                    </div>
                    <div class="col-md-5">
                        <h4 class="text-right text-success">Work Order Number: <b>{{ $worder->id }}</b></h4>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('bol_no', 'BOL Number', ['class' => 'control-label']) }}
                            {{ Form::text('bol_no', null, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('containers', 'Total Containers', ['class' => 'control-label']) }}
                            {{ Form::text('containers', null, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('weight', 'Total Weight', ['class' => 'control-label']) }}
                            {{ Form::text('weight', null, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">

                            {{ Form::label('vessel', 'Vessel', ['class' => 'control-label']) }}
                            {{ Form::text('vessel', null, ['class' => 'form-control border-input']) }}
                        </div>

                        
                    </div>

                    <div class="col-md-6">
                        
                        <div class="form-group label-floating">

                            {{ Form::label('cross_dock_no', 'Cross Dock Number', ['class' => 'control-label']) }}
                            {{ Form::text('cross_dock_no', null, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">

                            {{ Form::label('detail', 'Notes', ['class' => 'control-label']) }}
                            {{ Form::textarea('detail', null, ['class' => 'form-control border-input', 'rows' => '7']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group label-floating">
                            <div class="form-selct">
                                {{ Form::label('pick_up', 'Pick Up Point', ['class' => 'control-label']) }}
                                <select class="form-control border-input" id="client" name="pick_up" >
                                    <option value=""></option>

                                    @foreach($address as $addr)
                                        <option value="{{ $addr->id }}">{{ $addr->stop }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                            <div class="form-selct">
                                {{ Form::label('delivery', 'Delivery Point', ['class' => 'control-label']) }}
                                <select name="delivery" class="form-control border-input" required="required">
                                    <option value=""></option>

                                    @foreach($address as $addr)
                                        <option value="{{ $addr->id }}">{{ $addr->stop }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>



                    {{ Form::hidden('work_order_id', $worder->id) }}

                    <button type="submit" class="btn btn-rose btn-fill pull-right">Create BOL</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>

@endsection