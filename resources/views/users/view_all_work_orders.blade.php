@extends('user')
@section('title', 'View all Work Orders')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Showing all Work Orders</h4>
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
                                <th>Status</th>                                
                                <th>Entery Date</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Work Order</th>
                                <th>Account Name</th>
                                <th>Total Containers</th>
                                <th>Status</th>
                                <th>Entery Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach($workorders as $workorder)

                            <tr>
                                <td><a href="/work_order_details/{{ $workorder->id }}">{{ $workorder->id }}</td>
                                <td><a href="/work_order_details/{{ $workorder->id }}">{{ $workorder->client }}</a></td>
                                <td>{{ $workorder->container }}</td>
                                <td>
                                    @if($workorder->status == 0)
                                    Active
                                    @elseif($workorder->status == 2)
                                    Finished
                                    @endif
                                </td>
                                <td title="{{ date('H:i:s', strtotime($workorder->created_at)) }}">{{ date('m/d/Y', strtotime($workorder->created_at)) }}</td>
                                <td class="text-right">
                                    <a href="/work_order_details/{{ $workorder->id }}" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvrl</i></a>
                                    <a href="/work_order/{{ $workorder->id }}/edit" class="btn btn-simple btn-warning btn-icon" title="Edit the record"><i class="material-icons">mode_edit</i></a>
                                    <a href="/finished_work_order/{{$workorder->id}}" class="btn btn-simple btn-warning btn-icon" title="Mark the Work Order as finished!"><i class="material-icons">check</i></a>
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

@section('scripts')
    <script type="text/javascript">
    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function () {
      swal(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    })
    </script>
@endsection