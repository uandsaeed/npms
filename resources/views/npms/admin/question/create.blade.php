@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }} <small>Create new Quest </small></h1>
    @component('npms.admin.components.bootstrap.breadcrumb')
        <li class="active">
            <a href="{{ url('/admin/question') }}"><i class="fas fa-question-circle"></i> Questions</a>
        </li>
        <li class="">
            <i class="fas fa-plus"></i> create
        </li>
    @endcomponent
@stop

@section('content')

    <div class="row" id="page_product_create">
        <div class="col-lg-6 col-md-8 col-sm-12">

            @include('npms.admin.question.create_form')

        </div>

        @isset($question)
            <div class="col-lg-6 col-md-8 col-sm-12">

                @include('npms.admin.question.create_answers')

            </div>
        @endisset
    </div>

@stop