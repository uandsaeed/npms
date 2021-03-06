@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }}</h1>
    @component('npms.admin.components.bootstrap.breadcrumb')
        <li class="active"><i class="fas fa-tags"></i> Label</li>
        <li class="">
            <a href="{{ url('/admin/label/create') }}"><i class="fas fa-plus"></i> Create</a>
        </li>
        <li class="">
            <a href="{{ url('/admin/label/import') }}"><i class="fas fa-upload"></i> Import</a>
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
                    <form action="{{ url('/admin/label/search') }}" method="get">
                        <div class="input-group input-group-sm" style="width: 350px;">
                            <input type="text" name="search" class="form-control pull-right"
                                   value="{{ Request::get('search') }}"
                                   placeholder="Search Label" maxlength="50"/>

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
                        <th width="350px">Title</th>
                        <th width="350px">Keywords</th>
                        <th width="100px">Products</th>
                        <th width="530px">Description</th>
                        <th width="430px">Question</th>
                        <th width="50px">Type</th>
                        <th width="50px">Weight</th>
                        <th width="50px">Match Type</th>

                        <th width="150px">Updated By</th>
                        {{--<th width="120px">Updated at</th>--}}
                        <th width="120px">Last Sync</th>

                        <th width="300px">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($labels as $label)

                        <tr id="row_{{ $label->id }}">
                            <td>{{ $label->id }}</td>
                            <td>{{ $label->title }}</td>
                            <td>{{ $label->keywords }}</td>
                            <td><label class="badge {{ $label->products->count() > 0 ? 'bg-green' : '' }}"
                                >{{ $label->products->count() }}</label> <small>synced</small></td>
                            <td>{{ $label->description }}</td>
                            <td>{{ isset($label->question) ? $label->question->title : '' }}</td>
                            <td>{{ getLabelType($label->type) }}</td>
                            <td>{{ $label->weight }}</td>
                            <td> <label class="label label-{{ $label->match['class'] }}">{{ $label->match['label'] }}</label> </td>
                            <td>{{ $label->updatedBy->name }}
                                @isset($label->updated_at)
                                    <br/><small>at {{ $label->updated_at->diffForHumans() }}</small>
                                @endisset
                            </td>
                            {{--<td></td>--}}
                            <td>{{ isset($label->last_sync )? $label->last_sync->diffForHumans() : 'New'}}</td>
                            <td>
                                <form action="/admin/label/{{ $label->id }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <div class="btn-group btn-group-xs">
                                        <button class="btn btn-default btn-sync" data-id="{{ $label->id }}"
                                        type="button"><i class="fas fa-sync"></i> Sync</button>
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