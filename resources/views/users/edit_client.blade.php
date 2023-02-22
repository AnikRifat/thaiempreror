@extends('user')
@section('title', 'Edit Client')
@section('content')
    
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Add Client</h4>

                    {!! Form::model($client, ['route' => ['update.client', $client->id], 'method' => 'PUT', 'id' => 'RegisterValidation']) !!}
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group label-floating">                                
                                {{ Form::label('client', 'Client Name', ['class' => 'control-label container-label']) }}
                                {{ Form::text('client', $client->client, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('address_line_1', 'Address Line 1', ['class' => 'control-label container-label']) }}
                                {{ Form::text('address_line_1', $client->addr1, ['class' => 'form-control border-input']) }}
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">                                
                                {{ Form::label('contact', 'Contact', ['class' => 'control-label container-label']) }}
                                {{ Form::text('contact', $client->contact, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">                                
                                {{ Form::label('address_line_2', 'Address Line 2', ['class' => 'control-label container-label']) }}
                                {{ Form::text('address_line_2', $client->addr2,['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{ Form::label('detail', 'Details', ['class' => 'control-label container-label']) }}
                            {{ Form::textarea('detail', $client->detail, ['class' => 'form-control border-input', 'rows' => 5]) }}

                            <button type="submit" class="btn btn-rose btn-fill pull-right">Update Client</button> 
                        </div>

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