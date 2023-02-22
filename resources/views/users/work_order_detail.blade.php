@extends('user')
@section('title', 'Work Orders Details')
@section('content')
    
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <div class="col-md-5">
                    <h4 class="card-title">Work Order Details</h4>
                    </div>
                    <div class="col-md-5">
                        <h4 class="text-right text-success">Work Order Number: <b>{{ $worder->id }}</b></h4>
                    </div>
                    {!! Form::open(['method' => 'POST', 'id' => 'RegisterValidation']) !!}
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group label-floating">                                
                                {{ Form::label('account_name', 'Account Number', ['class' => 'control-label container-label']) }}
                                {{ Form::text('account_name', $worder->client, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('total_weight', 'Total Weight', ['class' => 'control-label container-label']) }}
                                {{ Form::text('total_weight', $worder->weight, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('Total_Container', 'Total Containers', ['class' => 'control-label container-label']) }}
                                {{ Form::text('Total_Container', $worder->container, ['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                
                                {{ Form::label('detail', 'Notes', ['class' => 'control-label container-label']) }}
                                {{ Form::textarea('detail', $worder->details, ['class' => 'form-control border-input', 'rows' => 7]) }}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <div class="row">
                        <div class="col-md-12">                                
                            <div class="card-content"> 
                            <h4 class="card-title">List of Bill of Lading</h4>

                            <?php $r = 0; ?>

                                @foreach($bols as $bol)
                            <?php $r++ ?>

                                <div class="table-responsive table-space">
                                    <table class="table table-bordered table-space">
                                        <thead class="text-primary">
                                            <tr>
                                                <th colspan="4">
                                                    <div class="col-md-4">
                                                        <span>BOL#:</span> <b>{{ $bol->bol_number }}</b>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span>Containers:</span> <b>{{ $bol->containers }}</b>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span>Weight:</span> <b>{{ $bol->total_weight }}</b>
                                                    </div>
                                                </th>
                                                <th colspan="3">
                                                    <div class="col-md-6 delte-parent">
                                <a href="/bol/{{ $bol->id }}/edit"><i class="material-icons">mode_edit</i></a>
                                <a href="/send_email_tickets/{{$bol->id}}"><i class="material-icons">email</i></a>
                                <a href="/print_tickets/{{$bol->id}}" target="_blank"><i class="material-icons">print</i></a>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                <a href="/add_container/{{$bol->id}}" class="container-btn btn-sm btn-primary">Add Container</a>
                                                    </div>
                                                </th>
                                            </tr></thead>
                                            <tbody>
                                                <tr id="c-single">
                                                    <td>ID#</td>
                                                    <td>Container#</td>
                                                    <td>Weight</td>
                                                    <td>Adtl. BOL</td>
                                                    <td>Adtl. BOL</td>
                                                    <td>Adtl. BOL</td>
                                                    <td class="text-primary text-right">Action</td>
                                                </tr>

<?php $containers = DB::table('containers')->where('bol_id', $bol->id)->get(); ?>

                                            @foreach($containers as $container)
                                           
                                                <tr>
                                                    <td>{{ $container->id }}</td>
                                                    <td><a href="/container_ticket_detail/{{ $container->id }}"> {{ $container->container }}</a></td>
                                                    <td>{{ $container->size }}</td>
                                                    <td>{{ $container->add_bol1 }}</td>
                                                    <td>{{ $container->add_bol3 }}</td>
                                                    <td>{{ $container->add_bol3 }}</td>
                                                    <td class="text-right">
                                                        <a href="/add_container_ticket/{{ $container->id }}" class="text-success" title="View the record"><i class="material-icons">add</i></a>
                                                        <a href="/container_ticket_detail/{{ $container->id }}" class="text-info" title="View the record"><i class="material-icons">dvr</i></a>
                                                        <a href="/edit_container/{{ $container->id }}" class="text-warning" title="Edit the record"><i class="material-icons">edit</i></a>
                                                    </td>
                                                </tr>

                                                @endforeach

                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    

                                    @endforeach

                                    
                                </div>
                        </div>
                    </div>
                    
                    <div class="work-order-btn">
                        <a href="/add_bol/{{$worder->id}}" class="btn btn-rose">Add More BOL</a>
                        @if(!empty(count($tickets)))
                            <a href="/active_work_orders" class="btn btn-rose">Finish</a>
                        @endif
                    </div>                  
                </div>
            </div>
        </div>
    </div><!-- end row --> 
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