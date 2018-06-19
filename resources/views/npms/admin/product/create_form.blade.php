    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">Product Information</h3>
        </div>

        <form class="form-horizontal" method="post" action="/admin/product/{{ isset($product) ? $product->id : ''}}">

            <div class="box-body">
                {{ csrf_field() }}

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'title'])
                    <input type="text" class="form-control" id="title"
                           value="{{ isset($product) ? $product->title : ''  }}"
                           placeholder="title" name="title">
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'ingredients'])
                    <input type="text" class="form-control" id="ingredients"
                           value="{{ isset($product) ? $product->ingredients : ''  }}"
                           placeholder="ingredients" name="ingredients">
                @endcomponent


                <div class="form-group">
                    <label for="id_price" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="id_price" min="0" step="any"
                               value="{{ isset($product) ? number_format($product->price, 2, '.', ',') : '0.00'  }}"
                               placeholder="price" name="price">
                    </div>
                    <label for="id_currency" class="col-sm-2 control-label">Currency</label>
                    <div class="col-sm-4">

                        <select id="id_currency" class="form-control" name="currency">
                            <option {{ isset($product) ? $product->currency == 'USD' ? 'SELECTED' : '' : ''  }}>USD</option>
                            <option {{ isset($product) ? $product->currency == 'EUR' ? 'SELECTED' : '' : ''  }}>EUR</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="id_size" class="col-sm-2 control-label">Size</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="id_size" min="0"
                               value="{{ isset($product) ? $product->size : '0.0'  }}"
                               placeholder="Size" name="size">
                    </div>
                    <label for="id_unit" class="col-sm-2 control-label">Unit</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="id_unit"
                               value="{{ isset($product) ? $product->size_unit : ''  }}"
                               placeholder="Unit" name="unit">
                    </div>
                </div>

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'product_type_id'])
                    <select id="product_type_id" name="product_type_id" class="form-control">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}"
                                {{ isset($product) ? $product->product_type_id == $type->id ? 'SELECTED' : ''  : ''  }}
                            >{{ $type->title }}</option>
                    @endforeach
                    </select>
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'brand'])
                        <input type="text" class="form-control" id="id_brand"
                               value="{{ isset($product) ? isset($product->brand->title) ? $product->brand->title : '' : ''  }}"
                               placeholder="Brand" name="brand" maxlength="50">
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'URL'])
                    <input type="url" class="form-control" id="url"
                           value="{{ isset($product) ? isset($product->url) ? $product->url : '' : ''  }}"
                           placeholder="URL" name="url" maxlength="255">
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'status'])
                        <div class="radio" style="float: left;margin-right: 20px">
                            <label>
                                <input type="radio" name="status" value="1" id="optionsRadios1"
                                    {{ isset($product) ? $product->status == 1 ? 'checked' : '' : ''  }}>
                                <span class="label label-{{ isset($product) ? $product->status == 1 ? 'success' : 'default' : 'default'  }}">Active</span>
                            </label>
                        </div>
                        <div class="radio" style="float: left">
                            <label>
                                <input type="radio" name="status" value="0" id="optionsRadios1"
                                    {{ isset($product) ? $product->status == 0 ? 'checked' : '' : ''  }}
                                >
                                <span class="label label-{{ isset($product) ? $product->status == 0 ? 'warning' : 'default' : 'default'  }}">Inactive</span>

                            </label>
                        </div>

                @endcomponent

            </div>

            <div class="box-footer">
                @isset($product)
                <a href="/admin/product/create" class="btn btn-default btn-flat btn-sm"><i class="fas fa-plus"></i> Add New</a>
                @endisset

                <button type="submit" class="btn btn-info pull-right"><i class="fas fa-save"></i> Save</button>
            </div>

        </form>

    </div>
