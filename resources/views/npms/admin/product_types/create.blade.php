@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }} <small>Create new product</small></h1>
@stop

@section('content')

    <div class="row" id="page_product_create">
        <div class="col-lg-6 col-md-8 col-sm-12">

            @include('npms.admin.product.create_form')
        </div>

        @isset($product)
            <div class="col-lg-6 col-md-8 col-sm-12">

                @include('npms.admin.product.product_permission')
            </div>

        @endisset

    </div>

@stop