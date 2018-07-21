<div class="box box-default box-add-label">
    <div class="box-header">
        <h3 class="box-title">Add Label</h3>
        <div class="box-tools">
            <button type="button" class="btn btn-warning btn-sm btn-clear-label">Clear Table</button>
        </div>
    </div>
    <div class="box-body no-padding">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <p style="font-weight: 600;padding: 10px; background-color: darkred;color: white;"
                   id="js-answer-title" data-answer-id="">Please select an answer</p>
            </div>
            <div class="col-lg-8 col-sm-12">

                <div class="input-group">
                    <input type="text" class="input-lg form-control" placeholder="Search Label" maxlength="50"
                        id="input-search-label" />
                    <span class="input-group-btn">
                        <button type="button"
                                class="btn btn-default btn-search-label input-lg"><i class="fa fa-search"></i> Search</button>
                    </span>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-responsive table-sm">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Keywords</th>
                            <th>Match</th>
                            <th>Type</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="js-label-table">
                    </tbody>
                </table>

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
    <div class="box-body no-padding">
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
                                    data-title="{{ $answer->title }}"
                                    data-sort="{{ $answer->sort }}">Edit</button>
                            <button class="btn btn-default btn-xs btn-remove btn-flat" data-id="{{ $answer->id }}">Remove</button>
                            <button class="btn btn-info btn-xs btn-add-label btn-flat" data-id="{{ $answer->id }}"
                                    data-title="{{ $answer->title }}">Add Label</button>
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