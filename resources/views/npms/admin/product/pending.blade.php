@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }}</h1>
@stop

@section('content')

    <div class="row" id="page_product_pending">

        @include('npms.admin.product.search', ['status' => 0, 'url' => 'pending'])


        <div class="col-lg-12 col-md-12 col-sm-12">

            @component('npms.admin.components.bootstrap.box', [ 'box_body_class' => 'table-responsive' ])

                @slot('box_title')
                    Products need approval
                @endslot

                @slot('box_tools')

                @endslot

                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th width="20px">ID</th>
                        <th width="350px">Title</th>
                        <th width="550px">Ingredients</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Type</th>
                        <th width="100px">Updated By</th>
                        <th width="120px">Updated at</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)

                        <tr id="row_{{ $product->id }}">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>
                                @foreach(ingredient_explode($product->ingredients) as $item)
                                    <label class="label label-default label-ingredient">{{ $item }}</label>
                                @endforeach

                            </td>
                            <td>{{ $product->brand->title }}</td>
                            <td>{{ number_format($product->price, 2, '.', '.') }} <small class="text-muted">{{ $product->currency }}</small></td>
                            <td>{{ $product->size }}<small class="text-muted">{{ $product->size_unit }}</small></td>
                            <td>{{ $product->productType->title }}</td>
                            <td>{{ $product->createdBy->name }}</td>
                            <td>{{ $product->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ url('/admin/product/edit/'.$product->id) }}"
                                            class="btn btn-flat btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                    <button class="btn btn-flat btn-warning btn-approve" data-id="{{ $product->id }}">
                                        <i class="fas fa-check-square"></i> Approve</button>
                                </div>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>

                @slot('box_footer')
                        {{ $products->appends(request()->query())->links() }}
                @endslot

            @endcomponent

        </div>

    </div>

@stop