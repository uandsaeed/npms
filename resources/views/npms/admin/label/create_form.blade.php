    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">Label Information</h3>
        </div>

        <form class="form-horizontal" method="post" action="/admin/label/{{ isset($label) ? $label->id : ''}}">

            <div class="box-body">
                {{ csrf_field() }}

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'title'])
                    <input type="text" class="form-control" id="title"
                           value="{{ isset($label) ? $label->title : ''  }}"
                           placeholder="title" name="title">
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'description'])
                    <textarea class="form-control" id="ingredients"
                           placeholder="Description" name="description">{{ isset($label) ? $label->description : ''  }}

                    </textarea>
                @endcomponent

            </div>

            <div class="box-footer">
                @isset($label)
                <a href="/admin/label/create" class="btn btn-default btn-flat btn-sm"><i class="fas fa-plus"></i> Add New</a>
                @endisset

                <button type="submit" class="btn btn-info pull-right"><i class="fas fa-save"></i> Save</button>
            </div>

        </form>

    </div>
