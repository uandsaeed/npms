@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }}</h1>
@stop

@section('content')

    <div class="row" id="page_product_type">

{{--        @include('npms.admin.product.search', ['status' => 1, 'url' => 'browse'])--}}

        <div class="col-lg-12 col-md-12 col-sm-12">

            @component('npms.admin.components.bootstrap.box', [ 'box_body_class' => 'table-responsive' ])

                @slot('box_title')
                    Product Type List
                @endslot

                @slot('box_tools')

                    <a href="{{ url('/admin/product/types/create') }}"
                            class="btn btn-sm btn-primary" type="button"><i class="fas fa-plus"></i> Create</a>
                @endslot

                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th width="20px">ID</th>
                        <th width="350px">Title</th>
                        <th width="150px">Slug</th>
                        <th width="550px">Description</th>
                        <th width="80px">Products</th>
                        <th width="100px">Updated By</th>
                        <th width="120px">Created By</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($types as $type)

                        <tr id="row_{{ $type->id }}">
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->title }}</td>
                            <td>{{ $type->slug }}</td>
                            <td>{{ $type->description }}</td>
                            <td>
                                <label class="badge badget-info">{{ $type->products->count() }}</label>
                            </td>
                            <td>
                                {{ $type->createdBy->name }}<br/>
                                <small class="text-muted">{{ isset($type->created_at)  ? $type->created_at->diffForHumans() : ''}}</small>
                            </td>
                            <td>
                                {{ $type->updatedBy->name }}<br/>
                                <small class="text-muted">{{ isset($type->updated_at) ? $type->updated_at->diffForHumans() : ''}}</small>
                            </td>

                            <td>
                                <form method="post" action="{{ url('/admin/product/types/'.$type->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <div class="btn-group btn-group-xs">
                                        <a href="{{ url('/admin/product/types/'.$type->id) }}"
                                           class="btn btn-flat btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-flat btn-sm btn-warning">Delete</button>

                                    </div>
                                </form>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>

                </table>

                @slot('box_footer')
                        {{ $types->appends(request()->query())->links() }}
                @endslot
            @endcomponent

        </div>

    </div>

@stop