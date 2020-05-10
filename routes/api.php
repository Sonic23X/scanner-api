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

Route::middleware('cors')->group(function()
{
  //Users
  Route::post('/login', 'api\LoginController@login')->name('login');
  //Route::post('/register', 'api\LoginController@register');

  //rutas protegidas
  Route::middleware('auth:api')->group(function()
  {

  	Route::get('/all', 'api\LoginController@all');

  });
});
