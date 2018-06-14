    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">Question Information</h3>
        </div>

        <form class="form-horizontal" method="post" action="/admin/question/{{ isset($question) ? $question->id : ''}}">

            <div class="box-body">
                {{ csrf_field() }}

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'title'])
                    <input type="text" class="form-control" id="title"
                           value="{{ isset($question) ? $question->title : ''  }}"
                           placeholder="title" name="title">
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'description'])
                    <textarea class="form-control" id="ingredients"
                           placeholder="Description" name="description">{{ isset($question) ? $question->description : ''  }}

                    </textarea>
                @endcomponent

            </div>

            <div class="box-footer">
                @isset($question)
                <a href="/admin/question/create" class="btn btn-default btn-flat btn-sm"><i class="fas fa-plus"></i> Add New</a>
                @endisset

                <button type="submit" class="btn btn-info pull-right"><i class="fas fa-save"></i> Save</button>
            </div>

        </form>

    </div>
