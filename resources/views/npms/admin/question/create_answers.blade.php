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

    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">
                All Answers
            </h3>
        </div>
        <div class="box-body">
            <table class="table table-responsive table-sm" id="table-answers">

                <thead>
                <tr>
                    <th>Sort</th>
                    <th>Title</th>
                    <th width="150px" class="text-right">Action</th>
                </tr>
                </thead>
                <tbody id="answer-body">
                    @foreach($question->answers->sortBy('sort') as $answer)
                        <tr id="answer_{{ $answer->id }}">
                            <td>
                                {{ $answer->sort }}
                            </td>
                            <td>
                                {{ $answer->title }}
                            </td>
                            <td class="text-right">
                                <div class="btn-group bt-xs">
                                    <button class="btn btn-default btn-edit btn-xs btn-flat" data-id="{{ $answer->id }}"
                                    data-title="{{ $answer->title }}" data-sort="{{ $answer->sort }}"
                                    >Edit</button>
                                    <button class="btn btn-default btn-xs btn-remove btn-flat" data-id="{{ $answer->id }}">Remove</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
