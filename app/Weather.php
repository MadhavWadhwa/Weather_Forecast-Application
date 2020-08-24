<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \GuzzleHttp\Client;

class Weather extends Model
{
    public static function callForecastAPI($latAndLong)
  {

    $urlBase = "https://api.darksky.net/forecast/";

    $url = $urlBase . config('secrets.darkweb_api_key') . "/" . $latAndLong;

    $client = new Client();

    $response = $client->request('GET', $url, [
      'query' => 'exclude=minutely,alerts,flags']);

    $weather = json_decode($response->getBody(), true);

    return $weather;

  }

  public static function getCurrentWeather($latAndLong)
  {

    $weather = self::callForecastAPI($latAndLong);
    return $weather['currently'];

  }
}
