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
                        labels...
                    </td>
                    <td class="text-right">
                        <div class="btn-group bt-xs">
                            <button class="btn btn-default btn-edit btn-xs btn-flat" data-id="{{ $answer->id }}"
                                    data-title="{{ $answer->title }}" data-sort="{{ $answer->sort }}"
                            >Edit</button>
                            <button class="btn btn-default btn-xs btn-remove btn-flat" data-id="{{ $answer->id }}">Remove</button>
                            <button class="btn btn-info btn-xs btn-add-label btn-flat" data-id="{{ $answer->id }}">Add Label</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>