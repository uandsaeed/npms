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
                           placeholder="Description" name="description"
                        >{{ isset($label) ? trim($label->description) : ''  }}</textarea>
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'match_type'])
                    <select class="form-control" id="match_type" name="match_type">
                        @foreach(LABEL_RELEVANCE as $matchKey => $match)
                            <option value="{{ $matchKey }}" {{ isset($label) ? $label->match == $matchKey ? 'SELECTED' : '' : ''  }}
                            >{{ $match['label'] }}</option>
                        @endforeach
                    </select>
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'weight'])
                    <select class="form-control" id="weight" name="weight">
                        @foreach(LABEL_WEIGHT as $weightKey => $weight)
                            <option value="{{ $weightKey }}" {{ isset($label) ? $label->weight == $weightKey ? 'SELECTED' : '' : ''  }}
                            >{{ $weight }}</option>
                        @endforeach
                    </select>
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'keywords'])
                    <input type="text" class="form-control" id="keywords"
                           value="{{ isset($label) ? $label->keywords : ''  }}"
                           placeholder="Keywords" name="keywords" maxlength="250">
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'Type'])
                    <select class="form-control" id="type" name="type">
                        @foreach(LABEL_TYPE as $typeKey => $weight)
                            <option value="{{ $typeKey }}" {{ isset($label) ? $label->type == $typeKey ? 'SELECTED' : '' : ''  }}
                            >{{ $weight }}</option>
                        @endforeach
                    </select>
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
