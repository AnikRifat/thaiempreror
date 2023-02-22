@extends('admin')
@section('title', 'Showing Orders')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            
            {!! Form::open(['route' => 'admin.order.multi_delete', 'method' => 'POST']) !!}
            <div class="card-content">
                <h4 class="card-title">Showing Orders</h4>
                <div class="toolbar pull-right">
                    <!-- Here you can write extra buttons/actions for the toolbar -->
                    <a href="/admin/choose_order_option" class="text-success"><i class="material-icons">add_box</i></a>
            {{--  --}}
            <a href="#" class="text-danger" title="Delete all orders!" onclick="document.getElementById('target').style.display = 'block';"><i class="material-icons">delete_sweep</i></a>

            <div id="target" class="swal2-modal swal2-show delete-alert">
                <h2>Are you sure?</h2>
                <div class="swal2-content" style="display: block;">You want to delete this!</div>
                <hr class="swal2-spacer" style="display: block;">
                <button type="submit" class="btn btn-success"><i class="material-icons">check</i></button>
                <button class="btn btn-danger" type="button" onclick="this.parentNode.style.display = 'none';"><i class="material-icons">close</i></button>
            </div>
            {{--  --}}
                </div>
                <style type="text/css">
                .datatables td a{display: block;}
                </style>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th><input type="checkbox" onClick="toggle(this)"></th>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Order Type</th>
                                <th>Customer/Table no & Guest</th>
                                <th>Order Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><input type="checkbox" onClick="toggle(this)"></th>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Order Type</th>
                                <th>Customer/Table no & Guest</th>
                                <th>Order Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php $r = 0; ?>

                            @foreach($orders as $order)

                            <?php $r++; ?>

                            <tr ondblclick="window.location='/admin/order/{{ $order->id }}/details';" style="cursor:pointer" title="Double Click for Details">
                                <td><input type="checkbox" name="order_id[]" value="{{$order->id}}"></td>
                                <td>{{$r}}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_type }}</td>
                                <td>
                                    {{ $order->first_name.' '.$order->last_name}} 
                                    @if($order->order_type == 'DINE IN')
                                    <span title="Table No. & Guest">{{$order->table_no.' & '.$order->guest }}</span>
                                    @endif
                                </td>
                                <td>&pound; {{ $order->price }}</td>
                                <td>
                                    {!!
                                        $order->status == 1? '<span style="color:#080">Paid</span>':'<span style="color:#f00">Unpaid</span>'
                                    !!}
                                </td>
                                <td>{{ date('d M Y', strtotime($order->created_at)) }}</td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div> <!-- end content-->
            {!! Form::close() !!}
        </div> <!--  end card  -->
    </div> <!-- end col-md-12 -->
</div> <!-- end row -->
<script language="JavaScript">
    function toggle(source) {
      checkboxes = document.getElementsByName('order_id[]');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
      }
    }
</script>
@endsection