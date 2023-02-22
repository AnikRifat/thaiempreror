@extends('user')
@section('title', 'Show Address')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Showing Addresses</h4>
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
                            <th>City</th>
                            <th>State</th>
                            <th>ZIP</th>
                            <th>contact</th>
                            <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Address Titile</th>
                                <th>First</th>
                                <th>Last</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>ZIP</th>
                                <th>contact</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach($addresses as $address)

                            <tr>
                                <td><a href="/address/{{ $address->id }}/edit">{{ $address->stop }}</a></td>
                                <td>{{ $address->first }}</td>
                                <td>{{ $address->last }}</td>
                                <td>{{ $address->address }}</td>
                                <td>{{ $address->city }}</td>
                                <td>{{ $address->state }}</td>
                                <td>{{ $address->zip }}</td>
                                <td>{{ $address->contact }}</td>
                                <td class="text-right">
                                    <a href="/address/{{ $address->id }}/edit" class="btn btn-simple btn-info btn-icon" title="Edit the address"><i class="material-icons">dvr</i></a>
                                    <a href="/address/{{ $address->id }}/edit" class="btn btn-simple btn-warning btn-icon" title="Edit the address"><i class="material-icons">mode_edit</i></a>
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

