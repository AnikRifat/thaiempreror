@extends('user')
@section('title', 'BOL Confirm')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            
            {!! Form::open(['route' => 'add.bol.address', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <div class="col-md-5">
                    <h4 class="card-title">Confirm Bill of Lading</h4>
                    </div>
                    <div class="col-md-5">
                    <h4 align="center" class="text-success text-right">Work Order Number: <b>{{ $worder }}</b></h4>
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
                    </div>

                    <div class="col-md-6">
                        <div class="form-group label-floating">

                            {{ Form::label('vessel', 'Vessel', ['class' => 'control-label']) }}
                            {{ Form::text('vessel', $bol->vessel, ['class' => 'form-control border-input']) }}
                        </div>
                        <div class="form-group label-floating">

                            {{ Form::label('cross_dock_no', 'Cross Dock Number', ['class' => 'control-label']) }}
                            {{ Form::text('cross_dock_no', $bol->cross_dock_number, ['class' => 'form-control border-input']) }}
                        </div>
                        
                    </div>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            {{ Form::label('detail', 'Notes', ['class' => 'control-label']) }}
                            {{ Form::textarea('detail', $bol->bol_number, ['class' => 'form-control border-input', 'rows' => '5']) }}
                        </div>

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
                                    <td>{{ Form::text('p_stop', $pick_addr->stop, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>Stop</b></td>
                                    <td>{{ Form::text('d_stop', $deli_addr->stop, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>

                                <tr>
                                    <td class="text-right"><b>First</b></td>
                                    <td>{{ Form::text('p_first', $pick_addr->first, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>First</b></td>
                                    <td>{{ Form::text('d_first', $deli_addr->first, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Last</b></td>
                                    <td>{{ Form::text('p_last', $pick_addr->last, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>Last</b></td>
                                    <td>{{ Form::text('d_last', $deli_addr->last, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Address</b></td>
                                    <td>{{ Form::text('p_addr', $pick_addr->address, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>Address</b></td>
                                    <td>{{ Form::text('d_addr', $deli_addr->address, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>City</b></td>
                                    <td>{{ Form::text('p_city', $pick_addr->city, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>City</b></td>
                                    <td>{{ Form::text('d_city', $deli_addr->city, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>State</b></td>
                                    <td>{{ Form::text('p_state', $pick_addr->state, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>State</b></td>
                                    <td>{{ Form::text('d_state', $deli_addr->state, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>ZIP</b></td>
                                    <td>{{ Form::text('p_zip', $pick_addr->zip, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>ZIP</b></td>
                                    <td>{{ Form::text('d_zip', $deli_addr->zip, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Telephone</b></td>
                                    <td>{{ Form::text('p_tel', $pick_addr->contact, ['class' => 'form-control pick-de-input']) }}</td>
                                    <td class="text-right"><b>Telephone</b></td>
                                    <td>{{ Form::text('d_tel', $deli_addr->contact, ['class' => 'form-control pick-de-input']) }}</td>
                                </tr>
                            </tbody>
                        </table><br>
                    </div>

                    {{ Form::hidden('bol_id', $bol->id) }}
                    {{ Form::hidden('pick_addr_id', $pick_addr->id) }}
                    {{ Form::hidden('deli_addr_id', $deli_addr->id) }}
                    {{ Form::hidden('work_order_id', $worder) }}

                    <button type="submit" class="btn btn-rose btn-fill pull-right">Confirm BOL</button>
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