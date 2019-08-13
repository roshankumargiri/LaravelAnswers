<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class ApiController extends Controller
{
    public function github($username)
    {
        //https://api.github.com/users/roshankumargiri
        $client = new GuzzleClient();



        $response =  $client->get("https://api.github.com/users/$username");
        $body = json_decode($response->getBody());

        print "Name: $body->name.<br/>";
        print "Location: $body->location.<br/>";
        print "Bio: $body->bio.<br/>";
    }
    public function getWeather()
    {
        // return 'a';
        return view('weather');
    }
    public function getWeatherJs()
    {
        return view('weather-js');
    }
    public function postWeather(Request $request)
    {
        $this->validate($request, ['location' => 'required|min:5']);
        // google api to get coordinates
        $location = $request->location;

        // return $location;
        $googleClient =  new GuzzleClient;

        $response = $googleClient->get("https://maps.googleapis.com/maps/api/geocode/json?address=Kathmandu&key=AIzaSyDz8-xY0i5ubgw1dCurId9EuRpRGGEUCSc");


        // $response = '
        //     { "results" : [ { "address_components" : [ { "long_name" : "Kathmandu", "short_name" : "Kathmandu", "types" : [ "locality", "political" ] }, { "long_name" : "Bagmati", "short_name" : "Bagmati", "types" : [ "administrative_area_level_2", "political" ] }, { "long_name" : "Central Development Region", "short_name" : "Central Development Region", "types" : [ "administrative_area_level_1", "political" ] }, { "long_name" : "Nepal", "short_name" : "NP", "types" : [ "country", "political" ] }, { "long_name" : "44600", "short_name" : "44600", "types" : [ "postal_code" ] } ], "formatted_address" : "Kathmandu 44600, Nepal", "geometry" : { "bounds" : { "northeast" : { "lat" : 27.7499367, "lng" : 85.37316799999999 }, "southwest" : { "lat" : 27.667984, "lng" : 85.2790976 } }, "location" : { "lat" : 27.7172453, "lng" : 85.3239605 }, "location_type" : "APPROXIMATE", "viewport" : { "northeast" : { "lat" : 27.7499367, "lng" : 85.37316799999999 }, "southwest" : { "lat" : 27.667984, "lng" : 85.2790976 } } }, "place_id" : "ChIJv6p7MIoZ6zkR6rGN8Rt8E7U", "types" : [ "locality", "political" ] } ], "status" : "OK" }
        // ';


        $googleBody  = json_decode($response->getBody());
        // $googleBody  = json_decode($response);

        $coords = $googleBody->results[0]->geometry->location;








        // echo "Lat: $coords->lat <br />";
        // echo "lng: $coords->lng <br />";
        // exit;


        //use the coordinate to get weather from darksky

        $dsClient = new GuzzleClient();
        $dsUrl = "https://api.darksky.net/forecast/8bd00f4e0012a182dcdd94fee954a8a6/$coords->lat,$coords->lng";
        $dsResponse = $dsClient->get($dsUrl);
        $weatherBody = json_decode($dsResponse->getBody());

        // dd($googleBody);

        return view('weather-ready', compact('weatherBody'))->with('googleBody', $googleBody->results[0]);
    }
}
