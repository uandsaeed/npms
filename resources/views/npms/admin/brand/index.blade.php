@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }}</h1>
@stop

@section('content')

    <div class="row" id="page_brand">

        <div class="col-lg-12 col-md-12 col-sm-12">

            @component('npms.admin.components.bootstrap.box', [ 'box_body_class' => 'table-responsive' ])

                @slot('box_title')
                    Brand  List
                @endslot

                @slot('box_tools')

                    <a href="{{ url('/admin/brand/create') }}"
                            class="btn btn-sm btn-primary" type="button"><i class="fas fa-plus"></i> Create</a>
                @endslot

                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th width="20px">ID</th>
                        <th width="350px">Title</th>
                        <th width="150px">Slug</th>
                        <th width="550px">Description</th>
                        <th width="50px">Products</th>
                        <th width="100px">Updated By</th>
                        <th width="120px">Created By</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($brands as $brand)

                        <tr id="row_{{ $brand->id }}">
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->title }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->description }}</td>
                            <td>
                                <label class="badge badge-info">{{ $brand->products->count() }}</label>
                            </td>
                            <td>
                                {{ $brand->createdBy->name }}<br/>
                                <small class="text-muted">{{ isset($brand->created_at)  ? $brand->created_at->diffForHumans() : ''}}</small>
                            </td>
                            <td>
                                {{ $brand->updatedBy->name }}<br/>
                                <small class="text-muted">{{ isset($brand->updated_at) ? $brand->updated_at->diffForHumans() : ''}}</small>
                            </td>

                            <td>
                                <form method="post" action="{{ url('/admin/brand/'.$brand->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <div class="btn-group btn-group-xs">
                                        <a href="{{ url('/admin/brand/'.$brand->id) }}"
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
                        {{ $brands->appends(request()->query())->links() }}
                @endslot
            @endcomponent

        </div>

    </div>

@stop