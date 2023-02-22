@extends('admin')
@section('title', 'Showing Food Items')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <div class="col-md-6">
                    <h4 class="card-title">Showing All Foods</h4>
                </div>
                <div class="col-md-5 text-right">
                    <a class="text-success btn-icon" target="_blank" href="/admin/create_food_item"><i class="material-icons">add_box</i></a>
                </div>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Food ID</th>
                                <th>Food Name</th>
                                <th>Food Slug</th>
                                <th>Food Price</th>
                                <th>Category</th>
                                <th>Sub-Category</th>
                                <th>Created At</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Food ID</th>
                                <th>Food Name</th>
                                <th>Food Slug</th>
                                <th>Food Price</th>
                                <th>Category</th>
                                <th>Sub-Category</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php $r = 0; ?>

                            @foreach($foods as $food)

                            <?php $r++; ?>

                            <tr>
                                <td>{{$r}}</td>
                                <td>{{ $food->food_id }}</td>
                                <td>{{ $food->food_name }}</td>
                                <td>{{ $food->food_slug }}</td>
                                <td>{{ $food->price }}</td>
                                <td>{{ $food->cat_name }}</td>
                                <td>{{ $food->sub_cat_name }}</td>
                                <td>{{ date('d M Y', strtotime($food->created_at)) }}</td>
                                <td class="text-right">
                                    <a href="/admin/food/{{ $food->id }}/edit" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvr</i></a>
                                    <a href="/admin/food/{{ $food->id }}/edit" class="btn btn-simple btn-warning btn-icon" title="Edit the record"><i class="material-icons">mode_edit</i></a>

    @if(Auth::guard('admin')->user()->user_role == 'SUPER-ADMIN')

    <a href="#" class="btn btn-simple btn-danger btn-icon" title="Delete bil of lading!" onclick="document.getElementById('target{{$r}}').style.display = 'block';"><i class="material-icons">delete</i></a>

    {{ Form::open(['route' => ['admin.food.delete', $food->id], 'method' => 'DELETE', 'class' => 'button-form pull-left']) }}
    <div id="target{{$r}}" class="swal2-modal swal2-show delete-alert">
        <h2>Are you sure?</h2>
        <div class="swal2-content" style="display: block;">You want to delete this!</div>
        <hr class="swal2-spacer" style="display: block;">
        <button type="submit" class="btn btn-success"><i class="material-icons">check</i></button>
        <button class="btn btn-danger" type="button" onclick="this.parentNode.style.display = 'none';"><i class="material-icons">close</i></button>
    </div>
    {{ Form::close() }}

    @endif
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