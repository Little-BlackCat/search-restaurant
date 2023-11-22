<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RestaurantController extends Controller
{
    public function getRestaurants(Request $request)
    {
        $keyword = $request->input('keyword', 'Bang sue');
        $cacheKey = 'restaurants_' . $keyword;
        $restaurants = Cache::get($cacheKey);
        $client = new Client();

        if (!$restaurants) {
            $response = $client->request('POST', 'https://google-api31.p.rapidapi.com/map', [
                'body' => json_encode([
                    "text" => "restaurant",
                    "place" => $keyword,
                    "street" => "",
                    "city" => "",
                    "country" => "",
                    "state" => "",
                    "postalcode" => "",
                    "latitude" => "",
                    "longitude" => "",
                    "radius" => ""
                ]),
                'headers' => [
                    'X-RapidAPI-Host' => 'google-api31.p.rapidapi.com',
                    'X-RapidAPI-Key' => env('GOOGLE_MAPS_API_KEY'),
                    'content-type' => 'application/json',
                ],
            ]);
    
            $restaurants = json_decode($response->getBody(), true);
            Cache::put($cacheKey, $restaurants, now()->addHours(24));
        }

        return response([
            $restaurants,
        ]);
    }
}
