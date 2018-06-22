<div class="box box-info">

    <div class="box-header with-border">
        <h3 class="box-title">Brand Information</h3>
    </div>

    <form class="form-horizontal" method="post" action="/admin/brand/{{ isset($brand) ? $brand->id.'/update' : ''}}">

        <div class="box-body">
            {{ csrf_field() }}

            @component('npms.admin.components.bootstrap.form-group', ['name' => 'title'])
                <input type="text" class="form-control" id="title"
                       value="{{ isset($brand) ? $brand->title : ''  }}"
                       placeholder="title" name="title">
            @endcomponent


            @component('npms.admin.components.bootstrap.form-group', ['name' => 'slug'])
                <input type="text" class="form-control" id="slug"
                       value="{{ isset($brand) ? $brand->slug : ''  }}"
                       placeholder="slug" name="slug">
            @endcomponent

            @component('npms.admin.components.bootstrap.form-group', ['name' => 'description'])
                <input type="text" class="form-control" id="description"
                       value="{{ isset($brand) ? $brand->description : ''  }}"
                       placeholder="description" name="description">
            @endcomponent


        </div>

        <div class="box-footer">
            @isset($type)
            <a href="/admin/brand/create" class="btn btn-default btn-flat btn-sm"><i class="fas fa-plus"></i> Add New</a>
            @endisset

            <button type="submit" class="btn btn-info pull-right"><i class="fas fa-save"></i> Save</button>
        </div>

    </form>

</div>