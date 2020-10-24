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

    Route::post('/nivel2/cambiar_estado', 'Nivel2Controller@cambiar_estado');
    Route::get('/nivel2/listar', 'Nivel2Controller@listar');

    Route::post('/nivel2/guardar', 'Nivel2Controller@guardar');
    Route::post('/nivel2/guardar_s', 'Nivel2Controller@guardar_s');
    Route::post('/nivel2/guardar_oraciones', 'Nivel2Controller@guardar_oraciones');
    
    Route::post('/nivel2/editar_l', 'Nivel2Controller@editar_l');
    Route::post('/nivel2/editar_s', 'Nivel2Controller@editar_s');
    Route::post('/nivel2/editar_o', 'Nivel2Controller@editar_o');
    
    Route::delete('/nivel2/eliminar_letras/{id}', 'Nivel2Controller@eliminar_letras');
    Route::delete('/nivel2/eliminar_silabas/{id}', 'Nivel2Controller@eliminar_silabas');
    Route::delete('/nivel2/eliminar_oraciones/{id}', 'Nivel2Controller@eliminar_oraciones');
    
    //rutas del nivel 3
    Route::get('/nivel3/llamardatos', 'Nivel3Controller@llamardatos');
    Route::post('/nivel3/letras/respuesta', 'Nivel3Controller@letras_respuesta');
    Route::post('/nivel3/silabas/respuesta', 'Nivel3Controller@silabas_respuesta');
    Route::post('/nivel3/palabras/respuesta', 'Nivel3Controller@palabras_respuesta');
    Route::get('/nivel3/llamarresultados', 'Nivel3Controller@llamarresultados');

    Route::get('/nivel3/listar', 'Nivel3Controller@listar');
    Route::post('/nivel3/cambiar_estado', 'Nivel3Controller@cambiar_estado');
    Route::post('/nivel3/guardar_l', 'Nivel3Controller@guardar_l');
    Route::post('/nivel3/guardar_s', 'Nivel3Controller@guardar_s');
    Route::post('/nivel3/guardar_p', 'Nivel3Controller@guardar_p');

    Route::post('/nivel3/editar_l', 'Nivel3Controller@editar_l');
    Route::post('/nivel3/editar_s', 'Nive3Controller@editar_s');
    Route::post('/nivel3/editar_p', 'Nivel3Controller@editar_p');
    
    Route::delete('/nivel3/eliminar_letras/{id}', 'Nivel3Controller@eliminar_letras');
    Route::delete('/nivel3/eliminar_silabas/{id}', 'Nivel3Controller@eliminar_silabas');
    Route::delete('/nivel3/eliminar_palabras/{id}', 'Nivel3Controller@eliminar_palabras');

    //rutas del nivel 4
    Route::get('/nivel4/llamardatos', 'Nivel4Controller@llamardatos');
    Route::post('/nivel4/oraciones/respuesta', 'Nivel4Controller@oraciones_respuesta');
    Route::post('/nivel4/frases/respuesta', 'Nivel4Controller@frases_respuesta');
    Route::get('/nivel4/llamarresultados', 'Nivel4Controller@llamarresultados');
    Route::post('/nivel4/cambiar_estado', 'Nivel4Controller@cambiar_estado');

    Route::get('/nivel4/listar', 'Nivel4Controller@listar');
    Route::post('/nivel4/guardar_oraciones', 'Nivel4Controller@guardar_oraciones');
    Route::post('/nivel4/guardar_frases', 'Nivel4Controller@guardar_frases');

    Route::post('/nivel4/editar_oraciones', 'Nivel4Controller@editar_oraciones');
    Route::post('/nivel4/editar_frases', 'Nivel4Controller@editar_frases');
    
    Route::delete('/nivel4/eliminar_oraciones/{id}', 'Nivel4Controller@eliminar_oraciones');
    Route::delete('/nivel4/eliminar_frases/{id}', 'Nivel4Controller@eliminar_frases');
});

Route::get('/lang/{lang}', 'Controller@set_language')->name('set_language');

//visualizar imagenes almacenados en el servidor
Route::get('/perfil/imagenver/{imagen}', function ($imagen) {
    $filePath = base_path().'/imagenes/'.$imagen;
    return File::get($filePath);
});