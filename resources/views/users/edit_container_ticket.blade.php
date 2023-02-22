@extends('user')
@section('title', 'Edit Ticket')
@section('content')
    
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>

                {!! Form::model($ticket, ['route' => ['update.container.ticket', $ticket->id], 'method' => 'PUT', 'id' => 'RegisterValidation']) !!}

                <div class="card-content">
                    <h4 class="card-title">Edit Ticket</h4>

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
                                    
                                    
                                    <!--Ticket Details-->
                                    <div class="table-responsive table-space">
                                        <table class="table table-bordered table-space">
                                            <thead class="text-primary">
                                                <th>Ticket Details</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="col-md-4">
                                                           <div class="form-group label-floating">
                                                              <div class="form-selct"> 
                    
                    {{ Form::label('State', 'State', ['class' => 'control-label']) }}
                    {{ Form::select('State', ['--- Select One ---', 'Full' => 'Full', 'Empty' => 'Empty'], $ticket->state, ['class' => 'form-control']) }}
                                                              </div>
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Last_Free_Day', 'Last Free Day', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Last_Free_Day', $ticket->last_free_day, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Last_Rec_Date', 'Last Rec. Date', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Last_Rec_Date', $ticket->last_rec_day, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Appt_Time', 'Appt. Time', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Appt_Time', $ticket->appt_time, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Unload_Time', 'Unload Time', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Unload_Time', $ticket->unload_time, ['class' => 'form-control border-input']) }}
                                                            </div>                          
                                                        </div> 
                                                        <!--Next col-md4-->   
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                    {{ Form::label('Day_Rate', 'Day Rate', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Day_Rate', $ticket->day_rate, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Night_Rate', 'Night Rate', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Night_Rate', $ticket->night_rate, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Forklift_Charges', 'Forklift Charges', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Forklift_Charges', $ticket->forklift_charge, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Wait_Time_Rate', 'Wait Time Rate', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Wait_Time_Rate', $ticket->wait_time_rate, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Driver_Wait_Time', 'Driver Wait Time', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Driver_Wait_Time', $ticket->driver_wait_time, ['class' => 'form-control border-input']) }}
                                                            </div>                           
                                                        </div> 


                                                        <!--Next col-md4-->   
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                    {{ Form::label('In_Line', 'In Line', ['class' => 'control-label container-label']) }}
                    {{ Form::text('In_Line', $ticket->in_line, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('In_Gate', 'In Gate', ['class' => 'control-label container-label']) }}
                    {{ Form::text('In_Gate', $ticket->in_gate, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Cross_Dock', 'Cross Dock', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Cross_Dock', $ticket->cross_dock, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Exit', 'Exit', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Exit', $ticket->exit_ticket, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Account_Code', 'Account Code', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Account_Code', $ticket->account_code, ['class' => 'form-control border-input']) }}
                                                            </div>                       
                                                        </div>  
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                    
                                    </div> <!--Ticket Details END-->
                                </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    
                    <div class="ticket-buttons pull-right">

                        <a href="/work_order_details/{{$worder->id}}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-rose">Update Ticket</button>
                        
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