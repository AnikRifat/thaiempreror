@extends('admin')
@section('title', 'Choose Order Option')
@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">arrow_forward</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Choose Order Option</h4>

                    <style type="text/css">
                    .btn-order{
                        width: 160px;
                        text-align: center;
                        margin-right: 15px;
                    }
                    </style>

                    <div class="row">
                        <div class=" col-md-12 checkbox-radios"><br>
                            <div class="form-check form-check-inline">
                                <a class="btn-order btn btn-info" href="/admin/choose_order/HOME DELIVERY">HOME DELIVERY</a>
                                <a class="btn-order btn btn-success" href="/admin/choose_order/TAKE AWAY">TAKE AWAY</a>
                                <a class="btn-order btn btn-warning" href="/admin/choose_order/DINE IN">DINE IN</a>
                                <br><br>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                            <a class="text-warning btn btn-sm btn-success" href="/admin/order_type/paid">Paid Orders</a>
                            <a class="text-warning btn btn-sm btn-danger" href="/admin/order_type/unpaid">Unpaid Orders</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

