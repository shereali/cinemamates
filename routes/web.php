<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/{path}', 'HomeController@index')->where('path','([A-z\d\-\/_.]+)?');
