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
    Route::get('/notastotales', 'PerfilController@notastotales');

    Route::get('/perfil', 'PerfilController@recuperar');
    Route::post('/perfil', 'PerfilController@restablecer');
    Route::post('/imagen', 'PerfilController@imagen');
    Route::post('/password', 'PerfilController@password');
    
    //rutas del nivel 2
    Route::get('/nivel2/llamardatos', 'Nivel2Controller@llamardatos');
    Route::post('/nivel2/letras/respuesta', 'Nivel2Controller@letras_respuesta');
    Route::post('/nivel2/silabas/respuesta', 'Nivel2Controller@silabas_respuesta');
    Route::post('/nivel2/oraciones/respuesta', 'Nivel2Controller@oraciones_respuesta');
    Route::get('/nivel2/llamarresultados', 'Nivel2Controller@llamarresultados');
    
    Route::post('nivel2/agregar', 'Nivel2Controller@agregar');
    Route::post('nivel2/editar', 'Nivel2Controller@editar');
    Route::delete('nivel2/eliminar', 'Nivel2Controller@eliminar');

    Route::get('/nivel2/listar', 'Nivel2Controller@listar');
    Route::post('/nivel2/guardar', 'Nivel2Controller@guardar');
    
    //rutas del nivel 3
    Route::get('/nivel3/llamardatos', 'Nivel3Controller@llamardatos');
    Route::post('/nivel3/letras/respuesta', 'Nivel3Controller@letras_respuesta');
    Route::post('/nivel3/silabas/respuesta', 'Nivel3Controller@silabas_respuesta');
    Route::post('/nivel3/palabras/respuesta', 'Nivel3Controller@palabras_respuesta');
    Route::get('/nivel3/llamarresultados', 'Nivel3Controller@llamarresultados');

    Route::get('/nivel3/listar', 'Nivel3Controller@listar');
    Route::post('/nivel3/guardar', 'Nivel3Controller@guardar');

    //rutas del nivel 4
    Route::get('/nivel4/llamardatos', 'Nivel4Controller@llamardatos');
    Route::post('/nivel4/oraciones/respuesta', 'Nivel4Controller@oraciones_respuesta');
    Route::post('/nivel4/frases/respuesta', 'Nivel4Controller@frases_respuesta');
    Route::get('/nivel4/llamarresultados', 'Nivel4Controller@llamarresultados');

    Route::get('/nivel4/listar', 'Nivel4Controller@listar');
    Route::post('/nivel4/guardar', 'Nivel4Controller@guardar');
});

Route::get('/lang/{lang}', 'Controller@set_language')->name('set_language');
//visualizar imagenes almacenados en el servidor
Route::get('/perfil/imagenver/{imagen}', function ($imagen) {
    $filePath = base_path().'/imagenes/'.$imagen;
    return File::get($filePath);
});
