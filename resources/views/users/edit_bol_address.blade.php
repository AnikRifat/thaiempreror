@extends('user')
@section('title', 'Edit Bol Address')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            
            {!! Form::model($bol, ['route' => ['update.bol.address', $bol->id], 'method' => 'PUT', 'id' => 'RegisterValidation']) !!}
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <div class="col-md-6">
                    <h4 class="card-title">Edit BOL Address</h4>
                    </div>
                    <div class="col-md-5">
                    <h4 align="center" class="text-success text-right">Work Order Number: <b>{{ $worder->id }}</b></h4>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('bol_no', 'BOL Number', ['class' => 'control-label']) }}
                            {{ Form::text('bol_no', $bol->bol_number, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('containers', 'Total Containers', ['class' => 'control-label']) }}
                            {{ Form::text('containers', $bol->containers, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('weight', 'Total Weight', ['class' => 'control-label']) }}
                            {{ Form::text('weight', $bol->total_weight, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">

                            {{ Form::label('vessel', 'Vessel', ['class' => 'control-label']) }}
                            {{ Form::text('vessel', $bol->vessel, ['class' => 'form-control border-input',]) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        
                        <div class="form-group label-floating">

                            {{ Form::label('cross_dock_no', 'Cross Dock Number', ['class' => 'control-label']) }}
                            {{ Form::text('cross_dock_no', $bol->cross_dock_number, ['class' => 'form-control border-input']) }}
                        </div>

                        <div class="form-group label-floating">
                            {{ Form::label('detail', 'Notes', ['class' => 'control-label']) }}
                            {{ Form::textarea('detail', $bol->details, ['class' => 'form-control border-input', 'rows' => '7']) }}
                        </div>
                        
                    </div>

                    <div class="col-md-12">
                        <br>
                        <table class="table table-responsive table-bordered needed-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Pickup Point Details</th>
                                    <th colspan="2">Delivery Point Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-right"><b>Stop</b></td>
                                    <td>{{ Form::text('p_stop', $pickaddr->stop, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>Stop</b></td>
                                    <td>{{ Form::text('d_stop', $deliaddr->stop, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>

                                <tr>
                                    <td class="text-right"><b>First</b></td>
                                    <td>{{ Form::text('p_first', $pickaddr->first, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>First</b></td>
                                    <td>{{ Form::text('d_first', $deliaddr->first, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Last</b></td>
                                    <td>{{ Form::text('p_last', $pickaddr->last, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>Last</b></td>
                                    <td>{{ Form::text('d_last', $deliaddr->last, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Address</b></td>
                                    <td>{{ Form::text('p_addr', $pickaddr->address, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>Address</b></td>
                                    <td>{{ Form::text('d_addr', $deliaddr->address, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>City</b></td>
                                    <td>{{ Form::text('p_city', $pickaddr->city, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>City</b></td>
                                    <td>{{ Form::text('d_city', $deliaddr->city, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>State</b></td>
                                    <td>{{ Form::text('p_state', $pickaddr->state, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>State</b></td>
                                    <td>{{ Form::text('d_state', $deliaddr->state, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>ZIP</b></td>
                                    <td>{{ Form::text('p_zip', $pickaddr->zip, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>ZIP</b></td>
                                    <td>{{ Form::text('d_zip', $deliaddr->zip, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Telephone</b></td>
                                    <td>{{ Form::text('p_tel', $pickaddr->contact, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>Telephone</b></td>
                                    <td>{{ Form::text('d_tel', $deliaddr->contact, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                            </tbody>
                        </table><br>
                    </div>

                    {{ Form::hidden('pick_addr_id', $pickaddr->id) }}
                    {{ Form::hidden('deli_addr_id', $deliaddr->id) }}

                    <button type="submit" class="btn btn-rose btn-fill pull-right">Update BOL</button>
                    <a href="/work_order_details/{{$worder->id}}" class="btn btn-default btn-fill pull-right">Back To Work Order</a>
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