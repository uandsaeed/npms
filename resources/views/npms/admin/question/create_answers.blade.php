    <div class="box box-default">

        <div class="box-header with-border">
            <h3 class="box-title">Add Answers</h3>
        </div>

        <form class="form-horizontal"  action="#">

            <div class="box-body">
                <input type="hidden" id="question_id" value="{{ $question->id }}"/>
                {{ csrf_field() }}

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'title'])
                    <input type="text" class="form-control" id="answer_title"
                           placeholder="Answer Title" name="">
                @endcomponent

                @component('npms.admin.components.bootstrap.form-group', ['name' => 'Sort'])
                    <input type="number" class="form-control" id="answer_sort"
                           placeholder="Sort Rank" name="">
                @endcomponent

            </div>

            <div class="box-footer">
                {{--@isset($question)--}}
                <a href="javascript:void(0)" class="btn btn-default btn-new-answer btn-flat btn-xs"><i class="fas fa-plus"></i> New</a>
                {{--@endisset--}}

                <button type="button" class="btn btn-default btn-add-answer pull-right" data-type="insert"
                ><i class="fas fa-plus"></i> Add</button>
            </div>

        </form>

    </div>

