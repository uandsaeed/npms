<div id="product_labels" class="box box-default">

    <div class="box-header no-border">
        <h3 class="box-title"><i class="fas fa-tags"></i> Labels</h3>
    </div>
    <div class="box-body">
        <table class="table table-responsive table-borderless">
            <input type="hidden" id="product-id" value="{{ $product->id }}" />
            <thead>
                <tr>
                    <th>Label</th>
                    <th>Match</th>
                    <th>Weight</th>
                    <th class="text-right">Action</th>
                </tr>
                <tr>
                    <td style="width: 100%;" colspan="3">
                        <select class="input-sm form-control" id="js-select-product-labels">
                            <option></option>
                        </select>
                    </td>
                    <td class="text-right">
                        <button class="btn btn-flat btn-xs btn-info btn-add-product-label"
                                data-product-id="{{ $product->id }}" type="button"
                        ><i class="fas fa-plus"></i> Add</button>
                    </td>
                </tr>
            </thead>
            <tbody>
            @foreach($product->labels as $label)
                <tr id="row_label_{{ $label->id }}">
                    <td>{{ $label->title }}</td>
                    <td>{{ $label->match['label'] }}</td>
                    <td>{{ $label->weight }}</td>
                    <td class="text-right">
                        <button class="btn btn-flat btn-xs btn-warning btn-remove-product-label"
                                data-label-id="{{ $label->id }}" type="button"
                        ><i class="fas fa-trash"></i> Remove</button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>