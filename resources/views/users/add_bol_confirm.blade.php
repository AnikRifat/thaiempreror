@extends('home')
@section('title', 'Pick Up and Deliver Details')
@section('content')
    
<div class="row">
    <div class="card-content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Add Bill of Landing</h4>
                    <form class="form-horizontal" action="/work_orders_detail">
                    <div class="col-md-12 bill_of_landing_details">
                        <h5 class="">Work Order Number</h5>
                        <h4>123143</h4>
                    </div>

                    <div class="col-md-12 form-head">
                        <h5 class="">Bill of Landing Details</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 label-on-left">Bol Number</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Total Containers</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Total Weight</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-3 label-on-left">Vessel</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Cross Dock Number</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Note</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea rows="8" name="" cols="43" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 pick-up">
                            <h2>Pick Up Point Details</h2>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Stop</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">First</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Last</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Address</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">State</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Zip Code</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Telephone</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 delivery">
                            <h2>Delivery Point Details</h2>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Stop</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">First</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Last</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Address</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">State</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Zip Code</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Telephone</label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group form-button">
                                <button type="submit" class="btn btn-fill btn-rose btn-center">Create BOL</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end content-->
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