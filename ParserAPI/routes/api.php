<?php

use Illuminate\Http\Request;
use App\Item;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// api routes for menu items //

// get all menu items
Route::get('/v1/items', 'MenuController@getAllItem');

// get searched items
Route::get('/v1/search/items/{searchText}', 'MenuController@getItemsByName');

// get searched items by ingredients
Route::get('/v1/search/ingredients/{searchText}', 'MenuController@getItemsByIngredient');
