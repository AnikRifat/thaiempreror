@extends('user')
@section('title', 'Home')
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">search</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Make an advance work order search</h4>

                <div class="search-form">
                    {!! Form::open(['route' => 'worder.search', 'method' => 'POST', 'id' => 'RegisterValidation']) !!}

                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('order_number', 'Work Order Number', ['class' => 'control-label']) }}
                                {{ Form::text('order_number', null, ['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('client_name', 'Client Name', ['class' => 'control-label']) }}
                                {{ Form::text('client_name', null, ['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('total_weight', 'Total Weight', ['class' => 'control-label']) }}
                                {{ Form::text('total_weight', null, ['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('total_container', 'Total Container', ['class' => 'control-label']) }}
                                {{ Form::text('total_container', null, ['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        {{-- <div class="col-md-3 form-group label-floating">
                            
                            {{ Form::label('date_picker', 'Pick Up a Date', ['class' => 'control-label']) }}
                            {{ Form::text('date_picker', null, ['class' => 'form-control datepicker border-input']) }}
                        </div> --}}

                        <button type="submit" class="btn btn-rose btn-fill pull-right"><i class="material-icons">search</i> Search</button>

                    {!! Form::close() !!}
                </div>
            </div>       
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Most Recent Work Orders</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>Work Order</th>
                            <th>Account Name</th>
                            <th>Total Containers</th>
                            <th>Total Weight</th>                                
                            <th>Entry Date</th>
                            <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Work Order</th>
                                <th>Account Name</th>
                                <th>Total Containers</th>
                                <th>Total Weight</th>
                                <th>Entry Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach($workorders as $workorder)

                            <tr>
                                <td><a href="/work_order_details/{{ $workorder->id }}">{{ $workorder->id }}</a></td>
                                <td><a href="/work_order_details/{{ $workorder->id }}">{{ $workorder->client }}</a></td>
                                <td>{{ $workorder->container }}</td>
                                <td>{{ $workorder->weight }}</td>
                                <td title="{{ date('h:i:s', strtotime($workorder->created_at)) }}">{{ date('m/d/Y', strtotime($workorder->created_at)) }}</td>
                                <td class="text-right">
                                    <a href="/work_order_details/{{ $workorder->id }}" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvr</i></a>
                                    <a href="/work_order_details/{{ $workorder->id }}" class="btn btn-simple btn-warning btn-icon" title="Edit work order"><i class="material-icons">mode_edit</i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div><!-- end content-->
        </div><!--  end card  -->        
    </div>
</div><!--row end-->
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>
@endsection

