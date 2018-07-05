@extends('npms.site.template.site')

@section('title', $title)


@section('content')
    <div class="row">

        <div class="col-lg-12">

            <h1>{{ $question->title }}</h1>
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

    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 text-right">
            <button class="btn btn-primary btn-user-query" data-answer-id="" data-question-id="{{ $question->id }}"
                    type="button">Start</button>
        </div>
    </div>


@endsection