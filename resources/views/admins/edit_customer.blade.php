@extends('admin')
@section('title', 'Edit Customer')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Customer</h4>

    {!! Form::model($user, ['route' => ['admin.update.customer', $user->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-4">
                <div class="fileinput fileinput-new text-center pull-right" data-provides="fileinput" style="width:250px; margin-top:20px;">
                    <div class="fileinput-new thumbnail" style="width:160px;">
                        <img class="img-responsive" src="/images/avatar.png" alt="">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                        <span class="btn-round btn-rose btn-file btn-small">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="profile_image" />
                        </span>
                        <br />
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('first_name', 'First Name:', ['class' => 'control-label']) }}
                            {{ Form::text('first_name', $user->first_name, ['class' => 'form-control', 'required' =>''])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('last_name', 'Last Name:', ['class' => 'control-label']) }}
                            {{ Form::text('last_name', $user->last_name, ['class' => 'form-control', 'required' =>''])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('primary_phone', 'Primary Phone', ['class' => 'control-label']) }}
                            {{ Form::text('primary_phone', $user->primary_phone, ['class' => 'form-control', 'required' =>'']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {{ Form::label('secondary_phone', 'Seondary Phone', ['class' => 'control-label']) }}
                            {{ Form::text('secondary_phone', $user->secondary_phone, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                    <div class="form-group label-floating">
                        {{ Form::label('email', 'Email Address:(optional)', ['class' => 'control-label']) }}
                        {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                    </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group label-floating">
                    {{ Form::label('property_no', 'Property Number and Street Name', ['class' => 'control-label']) }}
                    {{ Form::text('property_no', $user->property_no, ['class' => 'form-control', 'required' =>'']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    {{ Form::label('town_name', 'Town Name', ['class' => 'control-label']) }}
                    {{ Form::text('town_name', $user->town_name, ['class' => 'form-control', 'required' =>'']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">
                    {{ Form::label('post_code', 'Post Code', ['class' => 'control-label']) }}
                    {{ Form::text('post_code', $user->post_code, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group label-floating">
                    {{ Form::label('note', 'Note:', ['class' => 'control-label']) }}
                    {{ Form::textarea('note', $user->note, ['class' => 'form-control', 'rows' => '3']) }}
                </div>
            </div>
        </div>
        <a class="btn btn-default" href="/admin/view_customers"><i class="material-icons">arrow_back</i></a>
        <a class="btn btn-success pull-right" href="/admin/create_order/{{$user->id}}"><i class="material-icons">shopping_cart</i></a>
        <button type="submit" class="btn btn-primary pull-right">
            <i class="material-icons">update</i> Update
        </button>
        <div class="clearfix"></div>
    {!! Form::close() !!}


    @if(Auth::guard('admin')->user()->user_role == 'SUPER-ADMIN')
    <?php $r = 0; ?>

    <a href="#" class="btn btn-simple btn-danger btn-icon" title="Delete this user!" onclick="document.getElementById('target{{$r}}').style.display = 'block';">delete</a>

    {{ Form::open(['route' => ['admin.user.delete', $user->id], 'method' => 'DELETE']) }}
        <div id="target{{$r}}" class="swal2-modal swal2-show delete-alert">
            <h2>Are you sure?</h2>
            <div class="swal2-content" style="display: block;">You want to delete this!</div>
            <hr class="swal2-spacer" style="display: block;">
            <button type="submit" class="btn btn-success"><i class="material-icons">check</i></button>
            <button class="btn btn-danger" type="button" onclick="this.parentNode.style.display = 'none';"><i class="material-icons">close</i></button>
        </div>
    {{ Form::close() }}

    @endif

                </div>
            </div>
        </div>
    </div>
@endsection