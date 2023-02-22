@extends('user')
@section('title', 'Container Ticket Details')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Container Ticket Details</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-content">
                                <h4 class="card-title text-center">Container Tickets Snapshot</h4>

                                <div class="table-responsive table-space">
                                    <table class="table table-bordered table-space">
                                        <thead class="text-primary">
                                            <th>Container Number</th>
                                            <th>BOL</th>
                                            <th>Work Order</th>
                                            <th>Container ID</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $container->container }}</td>
                                                <td>{{ $bol->bol_number }}</td>
                                                <td>{{ $worder->id }}</td>
                                                <td>{{ $container->id }}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <?php

                                $tickets = DB::table('tickets')->where('container_id', $container->id)->get();

                                $r = 0; 

                                ?>

                                @foreach($tickets as $ticket)

                                <?php $r++; ?>

                                <div class="table-responsive table-space">
                                    <table class="table table-bordered table-space">
                                        <thead class="text-primary">
                                            <th colspan="6" class="text-right">Ticket #: <b>{{ $container->container }}-{{ $ticket->ticket_number }}</b></th>
                                        </thead>
                                        <tbody>
                                            <tr id="c-single">
                                                <td>State</td>
                                                <td>Seal #</td>
                                                <td>Pickup</td>
                                                <td>Delivery</td>
                                                <td>Contact</td>
                                                <td class="text-primary text-right">
                                                <a href="/print_ticket/{{$ticket->id}}" target="_blank"><i class="material-icons">print</i></a>
                                                <a href="/send_email_ticket/{{$ticket->id}}"><i class="material-icons">email</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $ticket->state }}</td>
                                                <td>{{ $container->seal }}</td>
                                                <td>{{ DB::table('addresses')->find($ticket->pick_addr_id)->stop }}</td>
                                                <td>{{ DB::table('addresses')->find($ticket->deli_addr_id)->stop }}</td>
                                                <td>{{ DB::table('addresses')->find($ticket->deli_addr_id)->contact }}</td>
                                                <td class="text-right">
                                                    <div class="action-button">
                                                    <a href="/edit_container_ticket/{{$ticket->id}}" class="text-warning" title="Edit the ticket"><i class="material-icons">edit</i></a>
                                                    </div>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @endforeach

                            </div>
                    </div>
                </div>
                <div class="container-ticket-buttons">
                    <a href="/add_container_ticket/{{$container->id}}" class="btn btn-primary">Add Ticket</a>
                    <a href="/work_order_details/{{ $worder->id }}" class="btn btn-primary">Back to Work Order</a>
                </div>
                {!! Form::close() !!}
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