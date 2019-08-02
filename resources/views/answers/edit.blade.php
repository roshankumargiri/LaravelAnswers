@extends('template')
@section('content')
<div class="container">
    <form action="{{route('answers.update',$answer->id)}}" method="POST">
        @csrf
        @method('PUT')
        <h4>Edit Your Answer:</h4>
        <textarea class="form-control" name="content" id="content" cols="30" rows="4">{{$answer->content}}</textarea>
        <input type="hidden" value="{{$question->id}}" name="question_id" />
        <br>
        <button class="btn btn-info btn-sm">Save Changes</button>
        <br>

    </form>

</div>

@endsection
