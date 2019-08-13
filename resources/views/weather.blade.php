@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Enter an address to ger weather</h1>
            <hr>
            <form action="{{route('weather')}}" method="POST">
                @csrf
                <input type="text" name="location" style="margin:20px 0;" class="form-control"
                    placeholder="Enter zip code or address">
                <input type="submit" class="btn btn-primary" value="Get weather" />
            </form>
        </div>
    </div>
</div>

@endsection
