<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use App\Weather;
use App\Today;
use Cache;
use Log;
use Carbon;

class WeatherController extends Controller
{
    public function getapi()
    {
          $client = new client();
          $request = $client->get('http://api.insider.in/tag/list?tags=mumbai&amp;models=event');

          dd(json_decode($request->getBody()));
    }

    public function getCurrentView(Request $request)
    {
      $city=$request->name;
    $app_id = config("here.app_id");
    $app_code = config("here.app_code");
    $url = "https://weather.api.here.com/weather/1.0/report.json?product=forecast_hourly&name=${city}&oneobservation=false&language=en&app_id=${app_id}&app_code=${app_code}";
    Log::info($url);
    $client = new \GuzzleHttp\Client();
    $res = $client->get($url);
    if ($res->getStatusCode() == 200) {
      $j = $res->getBody();
      $obj = json_decode($j);
      $forecast = $obj->hourlyForecasts->forecastLocation;
    }
  $day = date("l");
  return view('home', ["forecast" => $forecast,
                       "day"=>$day]);

    }
}
