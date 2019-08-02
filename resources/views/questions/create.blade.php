@extends('template')

@section('content')
<div class="container">


    <h1>Ask a Question!</h1>
    <hr />
    <form action="{{route('questions.store')}}" method="POST">
        @csrf
        <label for="title">
            <h4>Question:</h4>
        </label>
        <input type="text" name="title" id="title" class="form-control">
        <label for="description">
            <h6>More Information:</h6>
        </label>
        <textarea type="text" name="description" id="description" class="form-control"></textarea>
        <br>
        <input type="submit" class="btn btn-primary btn-lg" value="Submit Question">
    </form>
</div>
@endsection
