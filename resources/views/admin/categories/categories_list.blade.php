@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product Categories <a href="{{route('product-categories.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($categories))
                            @foreach($categories as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                <td>
                                    <a href="{{ route('product-categories.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('product-categories.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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