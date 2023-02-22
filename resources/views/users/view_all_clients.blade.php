@extends('user')
@section('title', 'Showing all Clients')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Showing All Clients</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client Name</th>
                                <th>Contact</th>
                                <th>Address 1</th>
                                <th>Address 2</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Client Name</th>
                                <th>Contact</th>
                                <th>Address 1</th>
                                <th>Address 2</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php $r = 0; ?>

                            @foreach($clients as $client)

                            <?php $r++; ?>

                            <tr>
                                <td>{{ $r }}</td>
                                <td><a href="/client/{{ $client->id }}/edit">{{ $client->client }}</a></td>
                                <td><a href="/client/{{ $client->id }}/edit">{{ $client->contact }}</a></td>
                                <td>{{ $client->addr1 }}</td>
                                <td>{{ $client->addr2 }}</td>
                                <td class="text-right">
                                    <a href="/client/{{$client->id}}/edit" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvr</i></a>
                                    <a href="/client/{{$client->id}}/edit" class="btn btn-simple btn-warning btn-icon" title="Edit the record"><i class="material-icons">mode_edit</i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
<!-- end row --> 
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