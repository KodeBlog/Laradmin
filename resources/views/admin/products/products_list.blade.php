@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('products.products') <a href="{{route('products.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> @lang('general.app.create_new') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('products.code')</th>
                                <th>@lang('products.name')</th>
                                <th>@lang('products.description')</th>
                                <th>@lang('products.price')</th>
                                <th>@lang('products.brand')</th>
                                <th>@lang('products.category')</th>
                                @ability(('','edit,delete'))
                                <th>@lang('products.action')</th>
                                @endability
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>@lang('products.code')</th>
                                <th>@lang('products.name')</th>
                                <th>@lang('products.description')</th>
                                <th>@lang('products.price')</th>
                                <th>@lang('products.brand')</th>
                                <th>@lang('products.category')</th>
                                @ability(('','edit,delete'))
                                <th>@lang('products.action')</th>
                                @endability
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($products))
                            @foreach ($products as $row)
                            <tr>
                                <td>{{$row->product_code}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{number_format($row->price,2)}}</td>
                                <td>{{$row->brand->name}}</td>
                                <td>{{$row->category->name}}</td>
                                <td>
                                    <a href="{{ route('products.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('products.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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