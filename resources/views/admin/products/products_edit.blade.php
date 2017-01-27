@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('products.edit_product') <a href="{{route('products.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> @lang('general.nav.back') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('products.update', ['id' => $product->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_code">@lang('products.code') <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$product->product_code}}" id="product_code" name="product_code" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('product_code'))
                                <span class="help-block">{{ $errors->first('product_code') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_name">@lang('products.name') <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$product->product_name}}" id="product_name" name="product_name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('product_name'))
                                <span class="help-block">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">@lang('products.description')
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$product->description}}" id="description" name="description" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('description'))
                                <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">@lang('products.price') <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$product->price}}" id="price" name="price" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('price'))
                                <span class="help-block">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand_id">@lang('products.brand') <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="brand_id" name="brand_id">
                                    @if(count($brands))
                                    @foreach($brands as $row)
                                    <option value="{{$row->id}}" {{$row->id == $product->brand_id ? 'selected="selected"' : ''}}>{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('brand_id'))
                                <span class="help-block">{{ $errors->first('brand_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">@lang('products.category') <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="category_id" name="category_id">
                                    @if(count($categories))
                                    @foreach($categories as $row)
                                    <option value="{{$row->id}}" {{$row->id == $product->category_id ? 'selected="selected"' : ''}}>{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('category_id'))
                                <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">@lang('general.form.save_changes')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop