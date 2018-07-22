@extends('npms.site.template.site')

@section('title', $title)


@section('content')
    <div  class="row">


        @isset($products)

            <h1>Total {{ count($products) }} products</h1><br/>

            <ul>
            @foreach($products as $product)
                <li>{{ $product['title'] }}</li>
            @endforeach
            </ul>
        @else
            <div class="alert alwer-warnging">
                Sorry, no products found!
            </div>
        @endisset
    </div>



@endsection