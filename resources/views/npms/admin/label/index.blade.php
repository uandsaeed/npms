@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }}</h1>
    @component('npms.admin.components.bootstrap.breadcrumb')
        <li class="active"><i class="fas fa-tags"></i> Label</li>
        <li class="">
            <a href="{{ url('/admin/label/create') }}"><i class="fas fa-plus"></i> create</a>
        </li>
    @endcomponent
@stop

@section('content')

    <div class="row" id="page_pr">

        <div class="col-lg-12 col-md-12 col-sm-12">

            @component('npms.admin.components.bootstrap.box', [ 'box_body_class' => 'table-responsive' ])

                @slot('box_title')
                    All Labels
                @endslot

                @slot('box_tools')
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                @endslot

                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th width="20px">ID</th>
                        <th width="350px">Title</th>
                        <th width="550px">Description</th>
                        <th width="550px">Question</th>

                        <th width="100px">Updated By</th>
                        <th width="120px">Updated at</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($labels as $label)

                        <tr id="row_{{ $label->id }}">
                            <td>{{ $label->id }}</td>
                            <td>{{ $label->title }}</td>
                            <td>{{ $label->description }}</td>
                            <td>{{ isset($label->question) ? $label->question->title : '' }}</td>
                            <td>{{ $label->updatedBy->name }}</td>
                            <td>{{ $label->updated_at->diffForHumans() }}</td>
                            <td>
                                <form action="/admin/label/{{ $label->id }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <div class="btn-group btn-group-xs">
                                        <a href="{{ url('/admin/label/edit/'.$label->id) }}"
                                           class="btn btn-flat btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>

                </table>

                @slot('box_footer')
                        {{ $labels->appends(request()->query())->links() }}
                @endslot
            @endcomponent

        </div>

    </div>

@stop