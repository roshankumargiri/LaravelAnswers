@extends('template')

@section('content')
<div class="container">


    <h1>Edit Question</h1>
    <hr />
    <form action="{{route('questions.update',$question->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">
            <h4>Question:</h4>
        </label>
        <input type="text" name="title" id="title" class="form-control" value="{{$question->title}}">
        <label for="description">
            <h6>More Information:</h6>
        </label>
        <textarea type="text" name="description" id="description"
            class="form-control">{{$question->description}}</textarea>
        <br>
        <input type="submit" class="btn btn-primary btn-lg" value="Save Changes">
    </form>
</div>
@endsection
