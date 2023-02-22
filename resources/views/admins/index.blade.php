@extends('admin')
@section('title', 'Home')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Active Services</h4>
                <div class="toolbar">
                    <!-- Here you can write extra buttons/actions for the toolbar -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>Package</th>
                            <th>Time Limit</th>
                            <th>Price</th>
                            <th>Service</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Package</th>
                                <th>Time Limit</th>
                                <th>Price</th>
                                <th>Service</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach($active_services as $active_service)

                            <tr style="background:#{{($active_service->status == 0)?'ffb':''}}">
                                <td>{{ $active_service->package }}</td>
                                <td>{{ $active_service->time_limit }}</td>
                                <td>{{ "&#x9f3;".$active_service->amount }}</td>                                
                                <td>{{ $active_service->category }}</td>
                                <td>
                                    @if(!empty($active_service->start_at))
                                        {{ date('m/d/Y', strtotime($active_service->start_at)) }}
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($active_service->end_at))
                                        {{ date('m/d/Y', strtotime($active_service->end_at)) }}
                                    @endif
                                </td>
                                <td>
                                    @if($active_service->status == 0)
                                    New
                                    @elseif($active_service->status == 1)
                                    Active
                                    @elseif($active_service->status == 2)
                                    Finished
                                    @endif
                                </td>
                                
                                <td class="text-right">
                                    <a href="/admin/active_service_details/{{ $active_service->id }}" class="btn btn-simple btn-info btn-icon"><i class="material-icons">dvr</i></a>
                                    <a href="/admin/work_order/{{ $active_service->id }}/edit" class="btn btn-simple btn-warning btn-icon" title="Edit the record"><i class="material-icons">mode_edit</i></a>
                                    <a href="/admin/finished_work_order/{{$active_service->id}}" class="btn btn-simple btn-warning btn-icon" title="Mark the Work Order as finished!"><i class="material-icons">check</i></a>
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