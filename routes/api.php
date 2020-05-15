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

    //empresas
    Route::get('/empresa', 'api\EmpresaController@get');
  	Route::post('/empresa', 'api\EmpresaController@store');
    Route::put('/empresa/{id}', 'api\EmpresaController@update');
    Route::delete('/empresa/{id}', 'api\EmpresaController@destroy');

    //medidas
    Route::get('/medida', 'api\MedidaController@get');
  	Route::post('/medida', 'api\MedidaController@store');
    Route::put('/medida/{id}', 'api\MedidaController@update');
    Route::delete('/medida/{id}', 'api\MedidaController@destroy');

    //lecturas
  	Route::post('/lectura', 'api\LecturaController@store');
    Route::put('/lectura/{id}', 'api\LecturaController@update');
    Route::delete('/lectura/{id}', 'api\LecturaController@destroy');

    //areas
    Route::get('/area', 'api\AreaController@get');
  	Route::post('/area', 'api\AreaController@store');
    Route::put('/area/{id}', 'api\AreaController@update');
    Route::delete('/area/{id}', 'api\AreaController@destroy');

    //procesos
    Route::get('/proceso/{idEmpresa}', 'api\ProcesoController@get');
  	Route::post('/proceso', 'api\ProcesoController@store');
    Route::put('/proceso/{id}', 'api\ProcesoController@update');
    Route::delete('/proceso/{id}', 'api\ProcesoController@destroy');

    //productos
    Route::get('/producto/{id}', 'api\ProductoController@get');
  	Route::post('/producto', 'api\ProductoController@store');
    Route::put('/producto/{id}', 'api\ProductoController@update');
    Route::delete('/producto/{id}', 'api\ProductoController@destroy');

  });
});
