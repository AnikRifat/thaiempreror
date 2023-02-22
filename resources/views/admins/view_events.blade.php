@extends('admin')
@section('title', 'View Events')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <div class="col-md-6">
                    <h4 class="card-title">View All Events</h4>
                </div>
                <div class="col-md-5 text-right">
                    <a class="text-success btn-icon" target="_blank" href="/admin/create_event"><i class="material-icons">add</i></a>
                </div>
                
                <div class="toolbar">
                    <!-- Here you can write extra buttons/actions for the toolbar-->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Footer Text</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Footer Text</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php $r = 0; ?>

                            @foreach($events as $event)

                            <?php $r++; ?>

                            <tr>
                                <td>{{ $r }}</td>
                                <td><img src="/images/home/{{ $event->image}}" alt="" style="max-width:100px"></td>
                                <td>{{ $event->title}}</td>
                                <td>{{ $event->sub_title }}</td>
                                <td>{{ $event->footer_text }}</td>
                                <td>{{ $event->details }}</td>
                                <td>
                                    @if($event->status == 1)
                                    <span style="color:#0d0;">Activated</span>
                                    @else
                                    <span style="color:#aaa;">Deactivated</span>
                                    @endif
                                </td>
                                <td>{{ date('d M Y', strtotime($event->created_at)) }}</td>
                                <td class="text-right">
                                    <a href="/admin/edit_event/{{$event->id}}" class="btn btn-simple btn-warning btn-icon" title="Edit Event"><i class="material-icons">edit</i></a>

    @if(Auth::guard('admin')->user()->user_role == 'SUPER-ADMIN')

    <a href="#" class="btn btn-simple btn-danger btn-icon" title="Delete this event!" onclick="document.getElementById('target{{$r}}').style.display = 'block';"><i class="material-icons">delete</i></a>

    {{ Form::open(['route' => ['admin.event.delete', $event->id], 'method' => 'DELETE']) }}
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
            </div> <!-- end content-->
        </div> <!--  end card  -->
    </div> <!-- end col-md-12 -->
</div> <!-- end row --> 
@endsection