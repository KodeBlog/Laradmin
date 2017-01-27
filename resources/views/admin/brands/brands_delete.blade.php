@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('general.app.confirm.delete.title') <a href="{{route('brands.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> @lang('general.nav.back') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>@lang('general.app.confirm.delete.question') <strong>{{$brand->name}}?</strong></p>

                    <form method="POST" action="{{ route('brands.destroy', ['id' => $brand->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">@lang('general.form.delete') <strong>{{$brand->name}}</strong></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop