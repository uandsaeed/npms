@extends('adminlte::page')

@include('npms.admin.components.parts.title')

@section('content_header')
    <h1>{{ $title }} <small>Import Products from excel/csv file</small></h1>
@stop

@section('content')

    <div class="row" id="page_product_import">
        <div class="col-lg-6 col-md-8 col-sm-12">

            <div id="import-product-wrapper"></div>
        @component('npms.admin.components.fine-upload.template',
            ['template_id' =>'qq_product_upload_manual_template'])
                <button type="button" id="btn-upload-product" class="btn btn-primary">
                <i class="icon-upload icon-white"></i> Upload
                </button>
        @endcomponent
        </div>

        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Popover on right
        </button>


    </div>
    <br/>

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Products List</h3>

                    {{--<div class="box-tools">--}}
                        {{----}}
                    {{--</div>--}}
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Ingredients</th>
                            <th style="width: 40px">Price</th>
                            <th style="width: 40px">Currency</th>
                            <th style="width: 100px">Brand</th>
                            <th style="width: 40px">Size</th>
                            <th style="width: 40px">Unit</th>
                            <th style="width: 40px">Type</th>
                            <th style="width: 140px">Url</th>
                            <th style="width: 40px">Status</th>
                        </tr>
                        </thead>
                        <tbody id="import-products-list">

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@stop