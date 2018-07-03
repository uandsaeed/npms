<div class="box box-default box-add-label">
    <div class="box-header">
        <h3 class="box-title">Add Label</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <p style="font-weight: 600;padding: 10px; background-color: darkred;color: white;" id="js-answer-title">Label Title</p>

            </div>
            <div class="col-lg-6 col-sm-12">
                <select class="form-control" id="js-label-list">
                </select>

            </div>
            <div class="col-lg-2 col-sm-12">
                <button class="btn btn-primary btn-add-label-to-answer btn-flat ">Attach Label</button>
            </div>
        </div>
    </div>
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
                <th>Labels</th>
                <th width="200px" class="text-right">Action</th>
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
                    <td>
                        @foreach($answer->labels as $label)
                            <span id="label_{{ $answer->id }}_{{ $label->id }}"
                                    class="tag label label-{{ $label->match['class'] }}">
                              <span>{{ $label->title }}</span>
                              <a href="javascript:void(0)" class="js-remove-label-from-answer" data-label-id="{{ $label->id }}"
                                 data-answer-id="{{ $answer->id }}"
                              ><i class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a>
                            </span>

                        @endforeach
                    </td>
                    <td class="text-right">
                        <div class="btn-group bt-xs">
                            <button class="btn btn-default btn-edit btn-xs btn-flat" data-id="{{ $answer->id }}"
                                    data-title="{{ $answer->title }}" data-sort="{{ $answer->sort }}"
                            >Edit</button>
                            <button class="btn btn-default btn-xs btn-remove btn-flat" data-id="{{ $answer->id }}">Remove</button>
                            <button class="btn btn-info btn-xs btn-add-label btn-flat" data-id="{{ $answer->id }}"
                                    data-title="{{ $answer->title }}"
                            >Add Label</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
<style>
    .tag {
        font-size: 0.85em;
        font-weight: normal;
        padding: .3em .4em .4em;
        margin: 0 .1em;
    }
    .tag a {
        color: #bbb;
        cursor: pointer;
        opacity: 0.6;
    }
    .tag a:hover {
        opacity: 1.0
    }
    .tag .remove {
        vertical-align: bottom;
        top: 0;
    }
    .tag a {
        margin: 0 0 0 .3em;
    }
    .tag a .glyphicon-white {
        color: #fff;
        margin-bottom: 2px;
    }
</style>