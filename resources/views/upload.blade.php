@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Upload a profile Picture</h1>
            <hr>
            <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="picture" style="margin:20px 0;">
                <input type="submit" class="btn btn-primary" value="Upload" />
            </form>
        </div>
    </div>
</div>

@endsection
