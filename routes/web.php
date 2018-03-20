<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('sing_in');
});

Route::get('/login', array('as' => 'login', function() {
    return view('sing_in');
}));

Route::post('/login', [
    'as' => 'login',
    'uses' => 'Cuenta@login'
]);

Route::get('/registro', array('as' => 'registro', function() {
    return view('sing_up');
}));

Route::post('/registro', [
    'as' => 'registro',
    'uses' => 'Cuenta@registro'
]);

Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'Cuenta@logout'
]);

Route::group(['prefix' => 'public', 'middleware' => 'Usuario'], function(){
    
    Route::get('/meseros', array('as' => 'meseros', function(){
        return view('meseros/lista');
    }));
    
});    

Route::group(['prefix' => 'invitados', 'middleware' => 'UsuarioCliente'], function(){
    
    Route::get('/', array('as' => 'invitados', function(){
        return view('invitados/lista');
    }));
    
    Route::get('/agregar', array('as' => 'agregarinvitado', function(){
        return view('invitados/agregar');
    }));
    
    Route::post('/agregar', [
        'as' => 'agregarinvitado',
        'uses' => 'Gestion@agregarInvitado'
    ]);
    
});

Route::group(['prefix' => 'meseros', 'middleware' => 'UsuarioAdmin'], function(){
    
    Route::get('/agregar', array('as' => 'agregarmesero', function(){
        return view('meseros/agregar');
    }));
    
    Route::post('/agregar', [
        'as' => 'agregarmesero',
        'uses' => 'Gestion@agregarCamarero'
    ]);
    
});