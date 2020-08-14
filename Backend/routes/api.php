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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas de sesiones de usuario
Route::post('/register', 'RegisterController@register');
Route::post('/login', 'LoginController@login'); 
Route::post('/logout', 'LoginController@logout')->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    //rutas del nivel 2
    Route::post('/nivel2/letras/respuesta', 'Nivel2Controller@letras_respuesta');
    Route::post('/nivel2/silabas/respuesta', 'Nivel2Controller@silabas_respuesta');
});