@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }} <small>Edit product</small></h1>
@stop

@section('content')

    <div class="row" id="page_product_edit">
        <div class="col-lg-6 col-md-8 col-sm-12">

            @include('npms.admin.product.create_form')

        </div>

    </div>

@stop