@extends('user')
@section('title', 'Showing all Containers')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Showing All Containers</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Container Name</th>
                                <th>Work Order ID</th>
                                <th>BOL ID</th>
                                <th>Total Weight</th>                                
                                <th>Creation Date</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>BOL Name</th>
                                <th>Work Order ID</th>
                                <th>Total Containers</th>
                                <th>Total Weight</th>                                
                                <th>Creation Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach($containers as $container)

                            <tr>
                                <td><a href="/edit_container/{{ $container->id }}">{{ $container->container }}</a></td>
                                <td><a href="work_order_details/{{ $container->work_order_id }}">{{ $container->work_order_id }}</a></td>
                                <td><a href="bol/{{ $container->bol_id }}/edit">{{ $container->bol_id }}</a></td>
                                <td>{{ $container->weight }}</td>
                                <td title="{{ date('H:i:s', strtotime($container->created_at)) }}">{{ date('m/d/Y', strtotime($container->created_at)) }}</td>
                                <td class="text-right">
                                    <a href="/edit_container/{{ $container->id }}" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvrl</i></a>
                                    <a href="/edit_container/{{ $container->id }}" class="btn btn-simple btn-warning btn-icon" title="Edit the record"><i class="material-icons">mode_edit</i></a>
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