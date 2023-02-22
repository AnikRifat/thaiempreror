@extends('user')
@section('title', 'Show BOL Address')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Showing BOL Addresses</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>Address Titile</th>
                            <th>First</th>
                            <th>Last</th>
                            <th>Address</th>
                            <th>type</th>
                            <th>Address</th>
                            <th>BOL</th>
                            <th>Work Order</th>
                            <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Address Titile</th>
                                <th>First</th>
                                <th>Last</th>
                                <th>Address</th>
                                <th>type</th>
                                <th>Address</th>
                                <th>BOL</th>
                                <th>Work Order</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach($boladdresses as $boladdress)

                            <tr>
                                <td><a href="/address/{{ $boladdress->id }}/edit">{{ $boladdress->stop }}</a></td>
                                <td>{{ $boladdress->stop }}</td>
                                <td>{{ $boladdress->first }}</td>
                                <td>{{ $boladdress->last }}</td>
                                <td>
                                    @if($boladdress->type == 'pick')
                                    Pick up
                                    @elseif($boladdress->type == 'deli')
                                    Delivery
                                    @endif
                                </td>
                                <td>{{ $boladdress->addr_id }}</td>
                                <td>{{ $boladdress->bol_id }}</td>
                                <td><a href="/work_order_details/{{ $boladdress->work_order_id }}">{{ DB::table('workorders')->find($boladdress->work_order_id)->client }}</a></td>
                                
                                <td class="text-right">
                                    <a href="/address/{{ $boladdress->id }}/edit" class="btn btn-simple btn-warning btn-icon" title="Edit the record"><i class="material-icons">mode_edit</i></a>
                                    <a href="/delete_bol_address/{{$boladdress->id}}" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i><div class="ripple-container"></div></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div><!-- end content-->
        </div><!--  end card  -->        
    </div>
</div><!--row end-->
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
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>
@endsection

