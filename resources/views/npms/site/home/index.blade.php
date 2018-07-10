@extends('npms.site.template.site')

@section('title', $title)


@section('content')
    <div  class="row">

        {{--height: 800px;overflow: scroll;margin-top: 50px;--}}
        <div id="question-wizard" class="col-lg-12" style="background-color: #fafafa; ">

            @foreach($questions as $question)
                <div id="panel_{{ $question->sort }}" class="question-panel">

                    <h1><a href="#question_{{ $question->sort }}">{{ $question->title }}</a></h1>
                    <div class="well" >
                        <ul class="list-group checked-list-box">
                            @foreach($question->answers->sortBy('sort') as  $answer)
                                <li class="list-group-item" data-answer-id="{{ $answer->id }}">
                                    <div class="checkbox"></div> {{ $answer->title }}
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            @endforeach


        </div>

    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 text-right">
            {{--<form method="post" action="@">--}}
                <input type="hidden" id="input-question" name="question" value="" />
                <input type="hidden" id="input-answers" value="answers" />
                <button class="btn btn-primary btn-user-query" data-answer-id="" data-question-id="{{ $question->id }}"
                        type="submit">Submit</button>
            {{--</form>--}}
        </div>
    </div>


@endsection