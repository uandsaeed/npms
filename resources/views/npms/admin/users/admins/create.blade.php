@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }} <small>Create new User </small></h1>
    @component('npms.admin.components.bootstrap.breadcrumb')
        <li class="active">
            <a href="{{ url('/admin/moderator/') }}"><i class="fas fa-tags"></i> Admins</a>
        </li>
        <li class="">
            <i class="fas fa-plus"></i> Create
        </li>
    @endcomponent
@stop

@section('content')

    <div class="row" id="page_product_create">
        <div class="col-lg-6 col-md-8 col-sm-12">

            @include('npms.admin.users.admins.create_form')

        </div>

    </div>

@stop