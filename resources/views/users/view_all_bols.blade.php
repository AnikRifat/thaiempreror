@extends('user')
@section('title', 'Showing all Bill of Lading')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Showing All Bill of Ladings</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>BOL Name</th>
                                <th>Work Order ID</th>
                                <th>Total Containers</th>
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

                            @foreach($bols as $bol)

                            <tr>
                                <td><a href="/bol/{{ $bol->id }}/edit">{{ $bol->bol_number }}</a></td>
                                <td><a href="/work_order_details/{{ $bol->work_order_id }}">{{ $bol->work_order_id }}</a></td>
                                <td>{{ $bol->containers }}</td>
                                <td>{{ $bol->total_weight }}</td>
                                <td title="{{ date('H:i:s', strtotime($bol->created_at)) }}">{{ date('m/d/Y', strtotime($bol->created_at)) }}</td>
                                <td class="text-right">
                                    <a href="/bol/{{ $bol->id }}/edit" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvr</i></a>
                                    <a href="/bol/{{ $bol->id }}/edit" class="btn btn-simple btn-warning btn-icon" title="Edit the record"><i class="material-icons">mode_edit</i></a>
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