@extends('user')
@section('title', 'Ticket Details & Container')
@section('content')
    
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                        <h4 class="card-title">Add Ticket</h4>

                   {!! Form::open(['method' => 'POST', 'id' => 'RegisterValidation']) !!} 
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
                                                    <td>aa</td>
                                                    <td>aad</td>
                                                    <td>aa</td>
                                                    <td>aa</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Container Details-->
                                    <div class="table-responsive table-space">
                                        <table class="table table-bordered table-space">
                                            <thead class="text-primary">
                                                <th>Container Details</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                    {{ Form::label('vessel', 'Vessel', ['class' => 'control-label container-label']) }}
                    {{ Form::text('vessel', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('unit_number', 'Unit Number', ['class' => 'control-label container-label']) }}
                    {{ Form::text('unit_number', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('container_weight', 'Container Weight', ['class' => 'control-label container-label']) }}
                    {{ Form::text('container_weight', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('seal', 'Seal #', ['class' => 'control-label container-label']) }}
                    {{ Form::text('seal', null, ['class' => 'form-control border-input']) }}
                                                            </div>                          
                                                        </div> 
                                                        <!--Next col-md4-->   
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                    {{ Form::label('chassis', 'Chassis', ['class' => 'control-label container-label']) }}
                    {{ Form::text('chassis', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Trailer_Size', 'Trailer Size', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Trailer_Size', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Driver', 'Drive', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Driver', null, ['class' => 'form-control border-input']) }}
                                                            </div>                          
                                                        </div>  
                                                        <!--Next col-md4-->   
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                    {{ Form::label('Reference', 'Reference #', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Reference', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('adtl_bol_1', 'Adtl. BOL', ['class' => 'control-label container-label']) }}
                    {{ Form::text('adtl_bol_1', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('adtl_bol_2', 'Adtl. BOL', ['class' => 'control-label container-label']) }}
                    {{ Form::text('adtl_bol_2', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('adtl_bol_3', 'Adtl. BOL', ['class' => 'control-label container-label']) }}
                    {{ Form::text('adtl_bol_3', null, ['class' => 'form-control border-input']) }}
                                                            </div>                       
                                                        </div>  
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Container Details END-->
                                    
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
                                                              {{ Form::select('State', [
                                                                  '--- Select One ---', 
                                                                  'Full' => 'Full',
                                                                  'Empty' => 'Empty'
                                                                  ], null, ['class' => 'form-control']) }}
                                                              </div>
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Last_Free_Day', 'Last Free Day', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Last_Free_Day', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Last_Rec_Date', 'Last Rec. Date', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Last_Rec_Date', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Appt_Time', 'Appt. Time', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Appt_Time', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Unload_Time', 'Unload Time', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Unload_Time', null, ['class' => 'form-control border-input']) }}
                                                            </div>                          
                                                        </div> 
                                                        <!--Next col-md4-->   
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                    {{ Form::label('Day_Rate', 'Day Rate', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Day_Rate', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Night_Rate', 'Night Rate', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Night_Rate', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Forklift_Charges', 'Forklift Charges', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Forklift_Charges', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Wait_Time_Rate', 'Wait Time Rate', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Wait_Time_Rate', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Driver_Wait_Time', 'Driver Wait Time', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Driver_Wait_Time', null, ['class' => 'form-control border-input']) }}
                                                            </div>                           
                                                        </div> 


                                                        <!--Next col-md4-->   
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                    {{ Form::label('In_Line', 'In Line', ['class' => 'control-label container-label']) }}
                    {{ Form::text('In_Line', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('In_Gate', 'In Gate', ['class' => 'control-label container-label']) }}
                    {{ Form::text('In_Gate', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Cross_Dock', 'Cross Dock', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Cross_Dock', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Exit', 'Exit', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Exit', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Account_Code', 'Account Code', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Account_Code', null, ['class' => 'form-control border-input']) }}
                                                            </div>                       
                                                        </div>  
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Ticket Details END-->


                                    <!--Pickup And Delivery Details-->
                                    <div class="table-responsive table-space">
                                        <table class="table table-bordered table-space">
                                            <thead class="text-primary">
                                                <th>Delivery Details</th>
                                                <th>Pickup Details</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="padding-td">
                                                            <div class="form-group label-floating">
                        {{ Form::label('Stop', 'Stop', ['class' => 'control-label container-label']) }}
                        {{ Form::text('Stop', null, ['class' => 'form-control border-input']) }}
                                                                </div>
                                                                <div class="form-group label-floating">
                        {{ Form::label('First', 'First', ['class' => 'control-label container-label']) }}
                        {{ Form::text('First', null, ['class' => 'form-control border-input']) }}
                                                                </div>
                                                                <div class="form-group label-floating">
                        {{ Form::label('Last', 'Last', ['class' => 'control-label container-label']) }}
                        {{ Form::text('Last', null, ['class' => 'form-control border-input']) }}
                                                                </div>
                                                                <div class="form-group label-floating">
                        {{ Form::label('Address', 'Address', ['class' => 'control-label container-label']) }}
                        {{ Form::text('Address', null, ['class' => 'form-control border-input']) }}
                                                                </div>
                                                                <div class="form-group label-floating">
                        {{ Form::label('City', 'City', ['class' => 'control-label container-label']) }}
                        {{ Form::text('City', null, ['class' => 'form-control border-input']) }}
                                                                </div>
                                                                <div class="form-group label-floating">
                        {{ Form::label('State', 'State', ['class' => 'control-label container-label']) }}
                        {{ Form::text('State', null, ['class' => 'form-control border-input']) }}
                                                                </div>
                                                                <div class="form-group label-floating">
                        {{ Form::label('Zip', 'Zip', ['class' => 'control-label container-label']) }}
                        {{ Form::text('Zip', null, ['class' => 'form-control border-input']) }}
                                                                </div>
                                                                <div class="form-group label-floating">
                        {{ Form::label('Telephone', 'Telephone', ['class' => 'control-label container-label']) }}
                        {{ Form::text('Telephone', null, ['class' => 'form-control border-input']) }}
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td>
                                                    <div class="padding-td">
                                                        <div class="form-group label-floating">
                    {{ Form::label('Stop', 'Stop', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Stop', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('First', 'First', ['class' => 'control-label container-label']) }}
                    {{ Form::text('First', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Last', 'Last', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Last', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Address', 'Address', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Address', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('City', 'City', ['class' => 'control-label container-label']) }}
                    {{ Form::text('City', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('State', 'State', ['class' => 'control-label container-label']) }}
                    {{ Form::text('State', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Zip', 'Zip', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Zip', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                            <div class="form-group label-floating">
                    {{ Form::label('Telephone', 'Telephone', ['class' => 'control-label container-label']) }}
                    {{ Form::text('Telephone', null, ['class' => 'form-control border-input']) }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Ticket Details END-->


                                </div>
                        </div>
                    </div>
                    <div class="ticket-buttons">
                        <button type="submit" class="btn btn-rose">Add Ticket</button>
                        <a href="#" class="btn btn-rose">Cancel</a>
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