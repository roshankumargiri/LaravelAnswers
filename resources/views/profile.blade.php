@extends('template')
@section('content')
<div class="container">
    <img src="{{asset('storage/'.$user->thumbnail)}}" alt="" class="rounded float-right" style="max-height:100px;">
    <h1>{{$user->name}}'s Profile</h1>
    <p>
        See what {{$user->name}} has been up to on LaraAnswers.
    </p>
    <br>
    <hr />
    <div class="row">
        <div class="col-md-6">
            <h3>Questions</h3>
            @foreach ($user->questions as $question)
            <div class="card card-default">
                <div class="card-body">
                    <h4>{{$question->title}}</h4>
                    <p>
                        {{$question->description}}
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{route('questions.show',$question->id)}}" class="btn btn-link">View Question</a>
                </div>
            </div>
            @endforeach

        </div>
        <div class="col-md-6">
            <h3>Answers</h3>
            @foreach ($user->answers as $answer)
            <div class="card card-default">
                <div class="card-header">
                    {{$answer->question->title}}
                </div>
                <div class="card-body">
                    <p>
                        <small>{{$user->name}}'s answer:</small>
                        {{$answer->content}}
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{route('questions.show',$answer->question->id)}}" class="btn btn-link">View All tht
                        answers of this Question</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
