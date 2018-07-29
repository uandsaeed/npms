@extends('npms.site.template.front_end_1')

@section('title', $title)


@section('content')

    <p>Blank page</p>

    {{--signup--}}
    @include('npms.site.pages.widgets.signup')

    {{--contact--}}
    @include('npms.site.pages.widgets.contact')

@endsection