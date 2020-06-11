<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
  Route::post('/signup', 'API\AuthController@signUp')->middleware('api');

Route::group(['namespace' => 'API', 'middleware' => 'api'], function () {
  
    Route::post('/signin', 'AuthController@signIn');
    Route::post('/signout', 'AuthController@signOut');

    Route::apiResources(
        [
            'films' => 'ShowFilm'
        ]
    );
    
    Route::get('/movie/{slug}', 'ShowFilm@getSingleMovie');
});

Route::group(['namespace' => 'API', 'middleware' => 'auth:sanctum'], function(){ 
 Route::get('/country', 'CreateFilmController@getCountry'); 
 Route::get('/genre', 'CreateFilmController@getGenre'); 
 Route::post('/create-film', 'CreateFilmController@createNewFilm'); 
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
