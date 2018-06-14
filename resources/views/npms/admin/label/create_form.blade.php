    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">Label Information</h3>
        </div>

        <form class="form-horizontal" method="post" action="/admin/label/{{ isset($label) ? $label->id : ''}}">

            <div class="box-body">
                {{ csrf_field() }}

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'question'])
                    <select class="form-control" name="question_id">
                        @foreach($questions as $question)
                            <option value="{{ $question->id }}"
                            selected="{{ $question->id == $label->question_id  ? 'SELECTED' : 'false'}}"
                            >{{ $question->title }}</option>
                        @endforeach
                    </select>
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'title'])
                    <input type="text" class="form-control" id="title"
                           value="{{ isset($label) ? $label->title : ''  }}"
                           placeholder="title" name="title">
                @endcomponent


                @component('npms.admin.components.bootstrap.form-group', ['name' => 'description'])
                    <textarea class="form-control" id="ingredients"
                           placeholder="Description" name="description"
                        >{{ isset($label) ? trim($label->description) : ''  }}</textarea>
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'keywords'])
                    <input type="text" class="form-control" id="keywords"
                           value="{{ isset($label) ? $label->keywords : ''  }}"
                           placeholder="Keywords" name="keywords" maxlength="250">
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'backend_description'])
                    <textarea class="form-control" id="backend_description" rows="3"
                              placeholder="Backend Description"
                              name="backend_description">{{ isset($label) ? trim($label->back_description) : ''  }}</textarea>
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'frontend_description'])
                    <textarea class="form-control" id="frontend_description" rows="3"
                              placeholder="Frontend Description"
                              name="frontend_description">{{ isset($label) ? trim($label->front_description) : ''  }}</textarea>
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
