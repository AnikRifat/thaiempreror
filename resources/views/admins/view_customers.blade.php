@extends('admin')
@section('title', 'View All Customers')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <div class="col-md-6">
                    <h4 class="card-title">Showing All Customers</h4>
                </div>
                <div class="col-md-5 text-right">
                    <a class="text-success btn-icon" target="_blank" href="/admin/create_customer"><i class="material-icons">person_add</i> Add Customer</a>
                </div>
                
                <div class="toolbar">
                    <!-- Here you can write extra buttons/actions for the toolbar-->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Contact 2</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Join Date</th>
                                <th class="disabled-sorting text-right;">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Contact 2</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Join Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php $r = 0; ?>

                            @foreach($users as $user)

                            <?php $r++; ?>

                            <tr>
                                <td>{{ $r }}</td>
                                <td>{{ $user->first_name .' '.$user->last_name }}</td>
                                <td>{{ $user->primary_phone }}</td>
                                <td>{{ $user->secondary_phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->property_no.' '.$user->town_name.' '.$user->post_code }}</td>
                                <td>{{ $user->created_at? date('m/d/Y', strtotime($user->created_at)):'' }}</td>
                                <td class="text-right; width:300px;">
                                    {{-- <a href="/admin/customer/{{ $user->id }}/edit" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvr</i></a> --}}
                                    <a href="/admin/customer/{{$user->id}}/edit" class="btn btn-simple btn-warning btn-icon" title="Edit the record"><i class="material-icons">mode_edit</i></a>
                                    <a href="/admin/create_order/{{$user->id}}" class="btn btn-simple btn-primary btn-icon" title="Make a order"><i class="material-icons">shopping_cart</i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div> <!-- end content-->
        </div> <!--  end card  -->
    </div> <!-- end col-md-12 -->
</div> <!-- end row --> 
@endsection