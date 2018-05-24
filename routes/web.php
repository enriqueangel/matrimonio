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

Route::get('/', 'Principal@principal')->name('principal');

Route::get('/login', array('as' => 'login', function() {
    return view('sing_in');
}));

Route::get('/carrito', array('as' => 'carrito', function() {
    return view('carrito');
}));

Route::get('/catalogo', 'Productos@productos')->name('catalogo');

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
    
    Route::get('/productos', 'Productos@catalogo')->name('productos');
    
});    

Route::group(['prefix' => 'invitados', 'middleware' => 'UsuarioCliente'], function(){
    
    Route::get('/', array('as' => 'invitados', function(){
        return view('invitados/lista');
    }));
    
    Route::get('/agregar/{id?}', array('as' => 'agregarinvitado', function($id = 0){
        return view('invitados/agregar')->with('id', $id);
    }));
    
    Route::post('/agregar', [
        'as' => 'agregarinvitado',
        'uses' => 'Gestion@agregarInvitado'
    ]);
    
    Route::post('/borrar/{id}', [
        'as' => 'borrarinvitado',
        'uses' => 'Gestion@borrarInvitado'
    ]);
    
});

Route::group(['prefix' => 'meseros', 'middleware' => 'UsuarioAdmin'], function(){
    
    Route::get('/agregar/{id?}', array('as' => 'agregarmesero', function($id = 0){
        return view('meseros/agregar')->with('id', $id);
    }));
    
    Route::post('/agregar', [
        'as' => 'agregarmesero',
        'uses' => 'Gestion@agregarCamarero'
    ]);
    
    Route::post('/borrar/{id}', [
        'as' => 'borrarmesero',
        'uses' => 'Gestion@borrarMesero'
    ]);
    
});

Route::group(['prefix' => 'productos', 'middleware' => 'UsuarioAdmin'], function(){
    
    Route::get('/agregar/', array('as' => 'agregarproducto', function(){
        return view('productos/agregar');
    }));
    
    Route::get('/editar/{id?}', array('as' => 'editarproducto', function($id = 0){
        return view('productos/editar')->with('id', $id);
    }));
    
    Route::post('/agregar', [
        'as' => 'agregarproducto',
        'uses' => 'Productos@agregarProducto'
    ]);
    
    Route::post('/editar', [
        'as' => 'editarproducto',
        'uses' => 'Productos@editarProducto'
    ]);
    
    // Route::post('/borrar/{id}', [
    //     'as' => 'borrarmesero',
    //     'uses' => 'Gestion@borrarMesero'
    // ]);
    
});

Route::group(['prefix' => 'pagos'], function(){
    
    Route::get('/obtenerinformacionpago/{monto}', [
        'as' => 'obtenerinformacionpago',
        'uses' => 'Pagos@getObtenerinformacionpago'
    ]);
    
    Route::post('/compra/', 'Pagos@compra')->name('compra');
    
});

Route::group(['prefix' => 'mesas'], function(){
   
   Route::get('/lista', 'Mesas@lista')->name('listamesas');
   Route::get('/informacion/{id}', 'Mesas@informacion')->name('informacionmesa');
   Route::get('/meseros/{id}', 'Mesas@meseros')->name('meserosdisponibles');
   Route::get('/invitados/{id}', 'Mesas@invitados')->name('invitadosdisponibles');
   
   Route::post('/acomodar/', 'Mesas@acomodarInvitado')->name('acomodarinvitado');
   Route::post('/asignar/', 'Mesas@asignarMeseros')->name('asignarmeseros');
    
});