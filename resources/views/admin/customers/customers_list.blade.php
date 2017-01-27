@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('customers.customers') <a href="{{route('customers.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> @lang('general.app.create_new') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('customers.first_name')</th>
                                <th>@lang('customers.last_name')</th>
                                <th>@lang('customers.email')</th>
                                <th>@lang('customers.postal_address')</th>
                                <th>@lang('customers.physical_address')</th>
                                @ability(('','edit,delete'))
                                <th>@lang('customers.action')</th>
                                @endability
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>@lang('customers.first_name')</th>
                                <th>@lang('customers.last_name')</th>
                                <th>@lang('customers.email')</th>
                                <th>@lang('customers.postal_address')</th>
                                <th>@lang('customers.physical_address')</th>
                                @ability(('','edit,delete'))
                                <th>@lang('customers.action')</th>
                                @endability
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($customers))
                            @foreach($customers as $row)
                            <tr>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->last_name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->postal_address}}</td>
                                <td>{{$row->physical_address}}</td>
                                <td>
                                    <a href="{{ route('customers.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('customers.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
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