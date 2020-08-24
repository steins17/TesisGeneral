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
    Route::get('/perfil', 'PerfilController@recuperar');
    Route::post('/perfil', 'PerfilController@restablecer');
    Route::post('/imagen', 'PerfilController@imagen');
    Route::post('/password', 'PerfilController@password');

    //rutas del nivel 2
    Route::get('/nivel2/llamardatos', 'Nivel2Controller@llamardatos');
    Route::post('/nivel2/letras/respuesta', 'Nivel2Controller@letras_respuesta');
    Route::post('/nivel2/silabas/respuesta', 'Nivel2Controller@silabas_respuesta');
    Route::post('/nivel2/oraciones/respuesta', 'Nivel2Controller@oraciones_respuesta');
    
    //rutas del nivel 3
    Route::get('/nivel3/llamardatos', 'Nivel3Controller@llamardatos');
    Route::post('/nivel3/letras/respuestas', 'Nivel3Controller@letras_respuesta');
    Route::post('/nivel3/silabas/respuestas', 'Nivel3Controller@silabas_respuesta');
    Route::post('/nivel3/palabras/respuestas', 'Nivel3Controller@palabras_respuesta');

    //rutas del nivel 4
    Route::get('/nivel4/llamardatos', 'Nivel4Controller@llamardatos');
    Route::post('/nivel4/oraciones/respuestas', 'Nivel4Controller@oraciones_respuesta');
    Route::post('/nivel4/frases/respuestas', 'Nivel4Controller@frases_respuesta');

    Route::get('/lang/{lang}', 'Controller@set_language')->name('set_language');
});
//visualizar imagenes almacenados en el servidor
Route::get('/perfil/imagenver/{imagen}', function ($imagen) {
    $filePath = base_path().'/imagenes/'.$imagen;
    return File::get($filePath);
});
