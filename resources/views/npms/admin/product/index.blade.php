@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>headline</h1>
@stop

@section('content')

    <div class="row" id="page_pr">

        <div class="col-lg-12 col-md-12 col-sm-12">

            @component('npms.admin.components.bootstrap.box', [ 'box_body_class' => 'table-responsive' ])

                @slot('box_title')
                    Awesome component
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
                            <th>ID</th>
                            <th>Title</th>
                            <th>Ingredients</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Updated By</th>
                            <th>Added at</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>183</td>
                            <td>Title</td>
                            <td>Ingredients</td>
                            <td>$10.1</td>
                            <td>10mg</td>
                            <td>Vegan</td>
                            <td>Active</td>
                            <td>Ariful</td>
                            <td>11-7-2014</td>
                        </tr>

                        <tr>
                            <td>183</td>
                            <td>Title</td>
                            <td>Ingredients</td>
                            <td>$10.1</td>
                            <td>10mg</td>
                            <td>Vegan</td>
                            <td>Active</td>
                            <td>Ariful</td>
                            <td>11-7-2014</td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Title</td>
                            <td>Ingredients</td>
                            <td>$10.1</td>
                            <td>10mg</td>
                            <td>Vegan</td>
                            <td>Active</td>
                            <td>Ariful</td>
                            <td>11-7-2014</td>
                        </tr>



                    </tbody>
                </table>
            @endcomponent

        </div>

    </div>

@stop