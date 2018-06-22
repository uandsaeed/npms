<div class="box box-info">

    <div class="box-header with-border">
        <h3 class="box-title">Product Type Information</h3>
    </div>

    <form class="form-horizontal" method="post" action="/admin/product/types/{{ isset($type) ? $type->id : ''}}">

        <div class="box-body">
            {{ csrf_field() }}

            @component('npms.admin.components.bootstrap.form-group', ['name' => 'title'])
                <input type="text" class="form-control" id="title"
                       value="{{ isset($type) ? $type->title : ''  }}"
                       placeholder="title" name="title">
            @endcomponent


            @component('npms.admin.components.bootstrap.form-group', ['name' => 'slug'])
                <input type="text" class="form-control" id="slug"
                       value="{{ isset($type) ? $type->slug : ''  }}"
                       placeholder="slug" name="slug">
            @endcomponent

            @component('npms.admin.components.bootstrap.form-group', ['name' => 'description'])
                <input type="text" class="form-control" id="description"
                       value="{{ isset($type) ? $type->description : ''  }}"
                       placeholder="description" name="description">
            @endcomponent


        </div>

        <div class="box-footer">
            @isset($type)
            <a href="/admin/product/types/create" class="btn btn-default btn-flat btn-sm"><i class="fas fa-plus"></i> Add New</a>
            @endisset

            <button type="submit" class="btn btn-info pull-right"><i class="fas fa-save"></i> Save</button>
        </div>

    </form>

</div>