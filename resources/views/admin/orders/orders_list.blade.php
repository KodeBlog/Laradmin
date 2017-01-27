@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('orders.orders')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('orders.order_number')</th>
                                <th>@lang('orders.date')</th>
                                <th>@lang('orders.customer')</th>
                                <th>@lang('orders.total_amount')</th>
                                <th>@lang('orders.status')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>@lang('orders.order_number')</th>
                                <th>@lang('orders.date')</th>
                                <th>@lang('orders.customer')</th>
                                <th>@lang('orders.total_amount')</th>
                                <th>@lang('orders.status')</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($orders))
                            @foreach($orders as $row)
                            <tr>
                                <td>{{$row->order_number}}</td>
                                <td>{{$row->transaction_date}}</td>
                                <td>{{$row->customer->getFullName()}}</td>
                                <td>{{$row->total_amount}}</td>
                                <td>{{$row->status}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop