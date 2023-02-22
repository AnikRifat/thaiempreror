@extends('admin')
@section('title', 'Showing Orders')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple"><i class="material-icons">assignment</i></div>
            <div class="card-content">
                <h4 class="card-title">Showing Orders</h4>
                <div class="toolbar pull-right"></div>
                <style type="text/css">
                .datatables td a{display: block;}
                </style>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Order Type</th>
                                <th>Customer/Table no & Guest</th>
                                <th>Order Price</th>
                                <th>Status</th>
                                <th>Print Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Order Type</th>
                                <th>Customer/Table no & Guest</th>
                                <th>Order Price</th>
                                <th>Status</th>
                                <th>Print Status</th>
                                <th>Created At</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php $r = 0; ?>

                            @foreach($orders as $order)

                            <?php $r++; ?>

                            <tr ondblclick="window.location='/admin/order/{{ $order->id }}/details';" style="cursor:pointer" title="Double Click for Details">
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
                                    {!!$order->status == 1? '<span style="color:#080">Paid</span>':'<span style="color:#f00">Unpaid</span>'!!}
                                </td>
                                <td>
                                    @if($order->print_status == 0)
                                    Waiting
                                    @else
                                    Printed
                                    @endif
                                </td>
                                <td>{{ date('d M Y', strtotime($order->created_at)) }}</td>
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
@section('scripts')
<script type="text/javascript">
setTimeout(function(){
    alert('Yes working');
}, 3000);
    // window.print();
</script>
@endsection