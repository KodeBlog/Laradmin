@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('brands.brands') <a href="{{route('brands.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> @lang('general.app.create_new') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('brands.brand')</th>
                                <th>@lang('brands.description')</th>
                                @ability(('','edit,delete'))
                                <th>@lang('brands.action')</th>
                                @endability
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>@lang('brands.brand')</th>
                                <th>@lang('brands.description')</th>
                                @ability(('','edit,delete'))
                                <th>@lang('brands.action')</th>
                                @endability
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($brands))
                            @foreach($brands as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                @ability(('','edit,delete'))
                                <td>
                                    @permission(('edit'))
                                    <a href="{{ route('brands.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    @endpermission
                                    @permission(('delete'))
                                    <a href="{{ route('brands.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                    @endpermission
                                </td>
                                @endability
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