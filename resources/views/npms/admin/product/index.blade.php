@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }}</h1>
@stop

@section('content')

    <div class="row" id="page_pr">

        @include('npms.admin.product.search', ['status' => 1, 'url' => 'browse'])

        <div class="col-lg-12 col-md-12 col-sm-12">

            @component('npms.admin.components.bootstrap.box', [ 'box_body_class' => 'table-responsive' ])

                @slot('box_title')
                    Product List
                @endslot

                @slot('box_tools')


                @endslot

                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th width="20px">ID</th>
                        <th width="350px">Title</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th width="550px">Ingredients</th>
                        <th width="300px">Attached Labels</th>

                        <th width="180px">Updated By</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($products as $product)

                        <tr id="row_{{ $product->id }}">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}<br/>
                                <small class="text-info">{{ $product->productType->title }}</small>
                            </td>
                            <td>{{ $product->brand->title }}</td>
                            <td>{{ number_format($product->price, 2, '.', '.') }} <small class="text-muted">{{ $product->currency }}</small></td>
                            <td>{{ $product->size }}<small class="text-muted">{{ $product->size_unit }}</small></td>
                            <td>
                                @foreach(ingredient_explode($product->ingredients) as $item)
                                    <label class="label label-default label-ingredient">{{ $item }}</label>
                                @endforeach

                            </td>
                            <td>
                                @foreach($product->labels as $label)
                                    <label class="label label-success label-ingredient">{{ $label->title }}</label>
                                @endforeach
                            </td>
                            <td>{{ $product->updatedBy->name }}<br/>
                                <small class="text-muted">at {{ $product->updated_at->diffForHumans() }}</small>
                            </td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ url('/admin/product/edit/'.$product->id) }}"
                                       class="btn btn-flat btn-primary"><i class="fas fa-edit"></i> Edit</a>
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