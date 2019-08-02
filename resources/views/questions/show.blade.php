@extends('template')
@section('content')
<div class="container">
    <h1>{{$question->title}}</h1>
    <p class="lead">
        {{$question->description}}
    </p>
    <p>
        Submitted By: {{$question->user->name}}, {{$question->created_at->diffForHumans()}}
    </p>
    @if(Auth::id()==$question->user->id)
    <a class="btn btn-primary btn-sm" href="{{route('questions.edit',$question->id)}}">Edit</a>
    @endif
    <hr>
    @if($question->answers->count()>0)
    @foreach($question->answers as $answer)
    <div class="card">
        <div class="card-body">
            <p>
                {{$answer->content}}
            </p>
            <p>
                Answered By: {{$answer->user->name}}, {{$answer->created_at->diffForHumans()}}
            </p>
            @if(Auth::id()==$answer->user->id)
            <a class="btn btn-primary btn-sm" href="{{route('answers.edit',$answer->id)}}">Edit</a>
            @endif
        </div>
    </div>
    @endforeach
    @else
    <p>
        There are no answers for this question yet. Please consider submitting one below!
    </p>
    @endif
    <hr>
    <form action="{{route('answers.store')}}" method="POST">
        @csrf
        <h4>Submit Your Own Answer:</h4>
        <textarea class="form-control" name="content" id="content" cols="30" rows="4"></textarea>
        <input type="hidden" value="{{$question->id}}" name="question_id" />
        <br>
        <button class="btn btn-info btn-sm">Submit Answer</button>
        <br>

    </form>

</div>

@endsection
