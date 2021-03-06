<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>

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
                    <textarea {{ isset($product) ? $product->ingredients : ''  }} class="form-control" id="ingredients"
                              rows="5"
                              placeholder="ingredients" name="ingredients">{{ isset($product) ? $product->ingredients : ''  }}</textarea>
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'description'])
                    <textarea type="text" class="form-control" id="description"
                              placeholder="Description" name="description">{{ isset($product) ? $product->description : ''  }}</textarea>
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'instructions'])
                    <textarea type="text" class="form-control" id="instructions"
                              placeholder="Instructions" name="instructions">{{ isset($product) ? $product->instructions : ''  }}</textarea>
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

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'keywords'])
                    <textarea {{ isset($product) ? $product->keywords : ''  }} class="form-control" id="keywords"
                              rows="3" placeholder="keywords"
                              name="keywords">{{ isset($product) ? $product->keywords : ''  }}</textarea>

                            <div class="js-keyword-show hidden">
                                <i class="fa fa-plus-circle"></i>&nbsp;
                                <a href="javascript:void(0)"
                                   class="btn-show-keywords-suggestions text-right">Show suggestions</a>
                            </div>

                            <div class="js-keyword-hide ">
                                <i class="fa fa-minus-circle"></i>&nbsp;
                                <a href="javascript:void(0)"
                                   class="btn-hide-keywords-suggestions text-right">Hide suggestions</a>
                            </div>

                            <div class="js-keyword-suggestion-box">

                                @each('npms.admin.components.parts.tag', $keywords, 'title')

                            </div>
                @endcomponent

            </div>

            <div class="box-footer">
                @isset($product)
                <a href="/admin/product/create" class="btn btn-default btn-flat btn-sm"><i class="fas fa-plus"></i> Add New</a>
                @endisset

                <button type="submit" class="btn btn-info pull-right"
                        onclick="document.getElementById('description').value=ClassicEditor.instances.description.getData(); ClassicEditor.instances.description.destroy();
                                document.getElementById('instructions').value=ClassicEditor.instances.instructions.getData(); ClassicEditor.instances.instructions.destroy()"
                ><i class="fas fa-save"></i> Save</button>
            </div>

        </form>

    </div>
<script>

    var description = null;
    var instructions = null;

    ClassicEditor.create( document.querySelector( '#description' ) )
        .then( function (editor) {

            description = editor;
        })
        .catch(function(error){
            console.log('error ', error)
        });

    ClassicEditor.create( document.querySelector( '#instructions' ) )
        .then( function (editor) {
            instructions = editor;
        })
        .catch(function(error){
            console.log('error ', error)
        });

</script>

<style>
    .ck-editor__editable {
        min-height:150px;
    }
</style>