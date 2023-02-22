@extends('home')
@section('title', 'Show Users')
@section('content')
    
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <h4 class="card-title">Showing User List</h4>
        <div class="card-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th class="text-right">User Role</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Alex Mike</td>
                            <td>Design</td>
                            <td>2010</td>
                            <td class="text-right">&euro; 92,144</td>
                            <td class="td-actions text-right">
                                <a href="/admin/update_user" rel="tooltip" class="btn btn-success btn-simple">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#" rel="tooltip" class="btn btn-danger btn-simple">
                                    <i class="material-icons">close</i>
                                </a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>  
@endsection