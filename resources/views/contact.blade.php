@extends('template')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    <form action="{{route('contact')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" class="form-control" />
        </div>
        <div class="form-group">
            <label for="name">Message</label>
            <textarea name="message" class="form-control" id="message" cols="30" rows="6"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Send Email" />
    </form>



</div>
@endsection
