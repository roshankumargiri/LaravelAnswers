@extends('template')

@section('content')
<div class="container">

    <div class="jumbotron">
        <h1>Ask a Question!</h1>
        <p>Ask any question you want to know and we will get the answers for you.</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Ask Now</a>
    </div>

    <h2>Recent Questions:</h2>
    <hr>
    @foreach ($questions as $question)
    <div class="jumbotron">
        <h3>{{$question->title}}</h3>
        <p>
            {{$question->description}}
        </p>
        <a href="{{route('questions.show',$question->id)}}" class="btn btn-primary btn-sm">View Details</a>

    </div>
    <hr>
    @endforeach
    {{ $questions->links() }}



</div>
@endsection
