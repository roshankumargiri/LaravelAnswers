@extends('template')
@section('content')
<div class="container">
    <h1>Recent Questions:</h1>

    <hr>
    @foreach ($questions as $question)
    <div class="jumbotron">
        <h3>{{$question->title}}</h3>
        <p>
            {{$question->description}}
        </p>
        <a href="{{route('questions.show',$question->id)}}" class="btn btn-primary btn-sm">View Details</a>
        @if(Auth::id() == $question->user->id)
        <a class="btn btn-primary btn-sm" href="{{route('questions.edit',$question->id)}}">Edit</a>
        @endif

    </div>
    <hr>
    @endforeach
    {{ $questions->links() }}

</div>

@endsection
