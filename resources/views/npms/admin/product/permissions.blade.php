@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }} <small>Set visibility to product</small></h1>
@stop

@section('content')

    <div class="row" id="page_global_permission">
        <div class="col-lg-6 col-md-8 col-sm-12">

            <div id="global_permission" class="box box-default">

                <div class="box-header no-border">
                    <h3 class="box-title"><i class="fas fa-lock text-muted"></i> Global Permissions</h3>
                </div>
                <div class="box-body">
                    <table class="table table-responsive table-borderless">

                        <tbody id="table-global-permissions">
                            <tr>
                                <th>Field</th>
                                <th>Allowed</th>
                                <th width="180px">Updated By</th>
                                <th width="180px">Created By</th>
                                <th class="text-right">Change</th>

                            </tr>
                            <tr>
                                <td width="250px">
                                    <input type="text" id="field"  class="form-control" maxlength="100"/>
                                </td>
                                <td width="350px">
                                    <div class="radio" style="float: left; margin: 0 20px 0 0;">
                                        <label>
                                            <input type="radio" name="permission" id="opt_yes" value="1" checked="">Yes
                                        </label>
                                    </div>
                                    <div class="radio" style="float: left; margin: 0">
                                        <label>
                                            <input type="radio" name="permission" id="opt_no" value="0">No
                                        </label>
                                    </div>
                                </td>
                                <td><small class="text-muted js-updated-by">{{ Auth::user()->name }}</small></td>
                                <td><small class="text-muted js-created-by">{{ Auth::user()->name }}</small></td>
                                <th class="text-right">
                                    <button class="btn btn-xs btn-flat btn-info btn-insert-permission"
                                    ><i class="fas fa-plus"></i> Add</button>
                                </th>

                            </tr>

                            @foreach($permissions as $permission)
                                <tr id="permission_{{ $permission->id }}">
                                    <td>{{ ucfirst($permission->product_field) }}</td>
                                    <td>
                                        @if($permission->permission == 1)
                                            <label id="label_permission_{{ $permission->id }}"
                                                   class='label label-success'>Yes</label>
                                        @else
                                            <label id="label_permission_{{ $permission->id }}"
                                                   class='label label-default'>No</label>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $permission->updatedBy->name }}</small>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $permission->createdBy->name }}</small>
                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-flat btn-xs btn-primary btn-change-global-permission"
                                                data-id="{{ $permission->id }}" type="button"
                                        ><i class="fas fa-exchange-alt"></i> Change</button>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@stop