<div id="product_permission" class="box box-default">

    <div class="box-header no-border">
        <h3 class="box-title"><i class="fas fa-lock text-muted"></i> Permissions</h3>
    </div>
    <div class="box-body">
        <table class="table table-responsive table-borderless">
            {{--<thead>--}}
            {{--</thead>--}}
            <input type="hidden" id="product-id" value="{{ $product->id }}" />
            <tbody>
                <tr>
                    <th>Field</th>
                    <th>Allowed</th>
                    <th class="text-right">Change</th>

                </tr>
                @foreach($product->permissions as $permission)
                    <tr id="permission_{{ $permission->id }}">
                        <td>{{ ucfirst($permission->product_field) }}</td>
                        <td> @if($permission->permission == 1)
                                <label id="label_permission_{{ $permission->id }}"
                                       class='label label-success'>Yes</label>
                            @else
                                <label id="label_permission_{{ $permission->id }}"
                                        class='label label-default'>No</label>
                             @endif
                        </td>
                        <td class="text-right">
                            <button class="btn btn-flat btn-xs btn-primary btn-change-product-permission"
                                    data-id="{{ $permission->id }}" type="button"
                            ><i class="fas fa-exchange-alt"></i> Change</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>