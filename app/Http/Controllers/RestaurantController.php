<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RestaurantController extends Controller
{
//  /**
//  * This function retrieves a list of restaurants based on a specified keyword.
//  * It first checks the cache for the results, and if not found, it fetches the data
//  * from the Google Maps API. The retrieved results are cached for 24 hours.
//  *
//  * @param Request $request The incoming HTTP request object
//  * @return Response The response containing the retrieved restaurant data
//  */
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
