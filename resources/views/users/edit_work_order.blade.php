@extends('user')
@section('title', 'Edit Work Order')
@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($worder, ['route' => ['work.order.update', $worder->id], 'method' => 'PUT', 'id' => 'RegisterValidation']) }}
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">edit</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Edit Work Order</h4>
                        <?php DB::table('workorders')->orderBy('id', 'desc')->first()->id; ?>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <div class="form-selct"> 
                                {{ Form::label('client', 'Client:', ['class' => 'control-label']) }}
                                <select class="form-control" name="client">
                                    <option value=""></option>

                                    @foreach($clients as $client)
                                        <option <?php if($worder->client == $client->client){ echo 'selected'; } ?> value="{{ $client->client }}">{{ $client->client }}</option>
                                    @endforeach
                                </select>
                                </div>

                            </div>
                            <div class="form-group label-floating">
                                
                                {{ Form::label('total_weight', 'Total Weight:', ['class' => 'control-label']) }}
                                {{ Form::text('total_weight', $worder->weight, ['class' => 'form-control border-input']) }}
                            </div>
                            <div class="form-group label-floating">
                                {{ Form::label('total_container', 'Total Container:', ['class' => 'control-label']) }}
                                {{ Form::text('total_container', $worder->container, ['class' => 'form-control border-input']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                {{ Form::label('detail', 'Details:', ['class' => 'control-label']) }}
                                {{ Form::textarea('detail', $worder->details, ['class' => 'form-control border-input', 'rows' => 7]) }}
                            </div>
                        </div>
                        <div class="form-footer text-right">
                            <button type="submit" class="btn btn-rose btn-fill">Update Work Order</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
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