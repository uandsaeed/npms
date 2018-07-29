@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }}</h1>
    @component('npms.admin.components.bootstrap.breadcrumb')
        <li class="active"><i class="fas fa-tags"></i> Users</li>
        <li class="">
            <a href="{{ url('/admin/users/moderator/create') }}"><i class="fas fa-plus"></i> Create</a>
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
                    <form action="{{ url('/admin/users/search') }}" method="get">
                        <div class="input-group input-group-sm" style="width: 350px;">
                            <input type="text" name="search" class="form-control pull-right"
                                   value="{{ Request::get('search') }}"
                                   placeholder="Search Users" maxlength="50"/>

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                @endslot

                <table id="table-labels" class="table table-hover">

                    <thead>
                    <tr>
                        <th width="20px">ID</th>
                        <th width="350px">Name</th>
                        <th width="350px">Email</th>
                        <th width="100px">Gender</th>
                        <th width="130px">Age</th>
                        <th width="130px">Skin Tone</th>
                        <th width="120px">Last Login</th>
                        <th class="text-right" width="300px">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($items as $item)

                        <tr id="row_{{ $item->id }}">
                            @include('npms.admin.users.common.td')
                            <td class="text-right">
                                <form action="{{ url("/admin/users/$item->id") }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="btn-group btn-group-xs">
                                        <a href="{{ url('/admin/users/block/'.$item->id) }}"
                                           class="btn btn-flat btn-primary"><i class="fas fa-thumbs-down"></i> Block</a>
                                        <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>

                </table>

                @slot('box_footer')
                        {{ $items->appends(request()->query())->links() }}
                @endslot
            @endcomponent

        </div>

    </div>

@stop