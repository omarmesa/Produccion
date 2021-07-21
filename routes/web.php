<?php

use App\Contacto;
use Illuminate\Support\Facades\Route;

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
    return view('/auth/login');
});
Route::get('/r', function () {
    return view('/auth/register');
});


Route::get('/plantilla', 'plantillaController@index')->name('plantilla');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'PruevaController@index');

//Contactos
Route::get('/contactos', 'ContactosController@index')->name('contactos.index');
Route::get('/contactos/create', 'ContactosController@create')->name('contactos.create');
Route::post('/contactos/create', 'ContactosController@store')->name('contactos.store');
Route::get('/contactos/info/{id}', 'ContactosController@info')->name('contactos.info');
Route::get('/contactos/edit/{id}', 'ContactosController@edit')->name('contactos.edit');
Route::put('/contactos/update/{contacto}', 'ContactosController@update')->name('contactos.update');
Route::delete('/contactos/delete/{id}', 'ContactosController@destroy')->name('contactos.delete');
Route::get('/contactos/search', 'ContactosController@search')->name('contactos.search');

//Productos
Route::get('/productos', 'ProductosController@index')->name('productos.index');
Route::get('/productos/info/{id}', 'ProductosController@info')->name('productos.info');
Route::get('/productos/edit/{id}', 'ProductosController@edit')->name('productos.edit');
Route::delete('/productos/delete/{id}', 'ProductosController@destroy')->name('productos.delete');
Route::get('/productos/create', 'ProductosController@create')->name('productos.create');
Route::post('/productos/create', 'ProductosController@store')->name('productos.store');
Route::put('/productos/update/{id}', 'ProductosController@update')->name('productos.update');
Route::get('/productos/search', 'ProductosController@search')->name('productos.search');


//Usuarios
Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
Route::get('/usuarios/create', 'UsuariosController@create')->name('usuarios.create');
Route::post('/usuarios/create', 'UsuariosController@store')->name('usuarios.store');
Route::get('/usuarios/search', 'UsuariosController@search')->name('usuarios.search');
Route::get('/usuarios/info/{id}', 'UsuariosController@info')->name('usuarios.info');
Route::get('/usuarios/edit/{id}', 'UsuariosController@edit')->name('usuarios.edit');
Route::put('/usuarios/update/{id}', 'UsuariosController@update')->name('usuarios.update');
Route::delete('/usuarios/delete/{id}', 'UsuariosController@destroy')->name('usuarios.delete');

//Servicios
Route::get('/servicios', 'ServiciosController@index')->name('servicios.index');
Route::get('/servicios/info/{id}', 'ServiciosController@info')->name('servicios.info');
Route::get('/servicios/edit/{id}', 'ServiciosController@edit')->name('servicios.edit');
Route::delete('/servicios/delete/{id}', 'ServiciosController@destroy')->name('servicios.delete');
Route::get('/servicios/create', 'ServiciosController@create')->name('servicios.create');
Route::post('/servicios/create', 'ServiciosController@store')->name('servicios.store');
Route::put('/servicios/update/{id}', 'ServiciosController@update')->name('servicios.update');
Route::get('/servicios/search', 'ServiciosController@search')->name('servicios.search');

//Presupuestos
Route::get('/presupuestos', 'PresupuestosController@index')->name('presupuestos.index');
Route::get('/presupuestos/info/{id}', 'PresupuestosController@info')->name('presupuestos.info');
Route::get('/presupuestos/edit/{id}', 'PresupuestosController@edit')->name('presupuestos.edit');
Route::delete('/presupuestos/delete/{id}', 'PresupuestosController@destroy')->name('presupuestos.delete');
Route::get('/presupuestos/create', 'PresupuestosController@create')->name('presupuestos.create');
Route::post('/presupuestos/store', 'PresupuestosController@store')->name('presupuestos.store');
Route::put('/presupuestos/update/{id}', 'PresupuestosController@update')->name('presupuestos.update');
Route::get('/presupuestos/search', 'PresupuestosController@search')->name('presupuestos.search');
Route::post('/presupuestos/formulario/data/producto', 'PresupuestosController@formularioPrecioProducto')->name('presupuestos.productos');
Route::post('/presupuestos/formulario/data/servicio', 'PresupuestosController@formularioPrecioServicio')->name('presupuestos.servicios');
Route::post('/presupuestos/formulario/productoStock', 'PresupuestosController@formularioProductoStock')->name('presupuestos.productoStock');

//Facturas
Route::get('/facturas', 'FacturasController@index')->name('facturas.index');
Route::get('/facturas/info/{id}', 'FacturasController@info')->name('facturas.info');
Route::get('/facturas/edit/{id}', 'FacturasController@edit')->name('facturas.edit');
Route::delete('/facturas/delete/{id}', 'FacturasController@destroy')->name('facturas.delete');
Route::get('/facturas/create', 'FacturasController@create')->name('facturas.create');
Route::get('/facturas/create/con_presupuesto', 'FacturasController@createp')->name('facturas.create.presupuesto');
Route::get('/facturas/create/desde_cero', 'FacturasController@createc')->name('facturas.create.cero');
Route::post('/facturas/storep', 'FacturasController@storep')->name('facturas.storep');
Route::post('/facturas/storec', 'FacturasController@storec')->name('facturas.storec');
Route::put('/facturas/update/{id}', 'FacturasController@update')->name('presupuestos.update');
Route::get('/facturas/search', 'FacturasController@search')->name('facturas.search');
Route::post('/facturas/create/formulario/data/producto', 'PresupuestosController@formularioPrecioProducto')->name('facturas.productos');
Route::post('/facturas/create/formulario/data/servicio', 'PresupuestosController@formularioPrecioServicio')->name('facturas.servicios');
Route::post('/facturas/create/formulario/productoStock', 'PresupuestosController@formularioProductoStock')->name('facturas.productoStock');
Route::post('/facturas/create/formulario/data/presupuestos', 'FacturasController@formularioPrecioPresupuesto')->name('facturas.presupuestos');
Route::post('/facturas/create/formulario/data/impuestos', 'FacturasController@formularioImpuestosPresupuesto')->name('facturas.impuestos');
Route::post('/buscar/clientes','FacturasController@searchCliente')->name('buscar.clientes');
Route::post('/buscar/productos','FacturasController@searchProductos')->name('buscar.producto');
Route::post('/buscar/servicios','FacturasController@searchServicios')->name('buscar.servicios');

// Route::post('/buscar/clientes/buscador','BuscadorController@searchCliente')->name('buscar.clientes.buscador');

//PDF
Route::get('/download/{id}', 'PdfController@downloadPresupuesto')->name('pdf.downloadPresupuesto');
Route::get('/downloadFactura/{id}', 'PdfController@downloadFactura')->name('pdf.downloadFactura');

//Configuracion
Route::get('/configuracion', 'ConfiguracionController@index')->name('configuracion.index');
Route::get('/configuracion/info/{id}', 'ConfiguracionController@info')->name('configuracion.info');
Route::get('/configuracion/edit/{id}', 'ConfiguracionController@edit')->name('configuracion.edit');
Route::delete('/configuracion/delete/{id}', 'ConfiguracionController@destroy')->name('configuracion.delete');
Route::get('/configuracion/create', 'ConfiguracionController@create')->name('configuracion.create');
Route::post('/configuracion/create', 'ConfiguracionController@store')->name('configuracion.store');
Route::put('/configuracion/update/{id}', 'ConfiguracionController@update')->name('configuracion.update');
Route::get('/configuracion/search', 'ConfiguracionController@search')->name('configuracion.search');

//Impuestos
Route::get('/impuestos', 'ImpuestosController@index')->name('impuestos.index');
Route::get('/impuestos/info/{id}', 'ImpuestosController@info')->name('impuestos.info');
Route::get('/impuestos/create', 'ImpuestosController@create')->name('impuestos.create');
Route::post('/impuestos/store', 'ImpuestosController@store')->name('impuestos.store');
Route::get('/impuestos/edit/{id}', 'ImpuestosController@edit')->name('impuestos.edit');
Route::put('/impuestos/update/{id}', 'ImpuestosController@update')->name('impuestos.update');
Route::delete('/impuestos/delete/{id}', 'ImpuestosController@destroy')->name('impuestos.delete');
Route::get('/impuestos/search', 'ImpuestosController@search')->name('impuestos.search');

//Inversiones
Route::get('/inversiones', 'InversionController@index')->name('inversiones.index');
Route::get('/inversiones/info/{id}', 'InversionController@info')->name('inversiones.info');
Route::get('/inversiones/create', 'InversionController@create')->name('inversiones.create');
Route::post('/inversiones/store', 'InversionController@store')->name('inversiones.store');
Route::get('/inversiones/edit/{id}', 'InversionController@edit')->name('inversiones.edit');
Route::put('/inversiones/update/{id}', 'InversionController@update')->name('inversiones.update');
Route::delete('/inversiones/delete/{id}', 'InversionController@destroy')->name('inversiones.delete');
Route::get('/inversiones/search', 'InversionController@search')->name('inversiones.search');
Route::post('/productos-component','InversionController@getProductosComponent')->name('inversions.getProductosComponent');



/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
