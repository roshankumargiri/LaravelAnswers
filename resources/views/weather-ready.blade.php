@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $googleBody->formatted_address }}</h1>
            <hr>
            <p>
                {{$weatherBody->hourly->summary}}
            </p>
            <ul>
                <li>Current Temp: {{$weatherBody->currently->temperature}}</li>
                <li>Feels Like: {{$weatherBody->currently->apparentTemperature}}</li>
                <li>Wind Speed: {{$weatherBody->currently->windSpeed}}mph</li>
            </ul>
        </div>
    </div>
</div>

@endsection
