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



Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/micuenta', 'HomeController@miCuenta');


	// RUTAS GENERICAS
	Route::post('/crearlista', 'GenericController@crearLista');
	Route::post('/crearabm', 'GenericController@crearABM');
	//Route::get('/abm/{accion}/{gen_modelo}/{id}', 'GenericController@show');
	//Route::get('/crearlista/{gen_modelo}', 'GenericController@crearLista');
	Route::post('/enviarabm/{gen_modelo}', 'GenericController@crearABM');
	Route::post('/store', 'GenericController@store');
	// FIN RUTAS GENERICAS

	Route::get('/reservas/calendario-de-reservas/{cabania_id}', 'ReservaController@calendarioDeReservas');
	Route::get('/reservas/calendario-de-reservas/{cliente_id}', function () {
	    return view('reservas/calendario-de-reservas');
	});	

	Route::post('/Reservas/crear/listar-clientes-para-seleccion', 'ReservaController@listarClientesParaSeleccion');
	Route::get('/Reservas/crear/elegir-cliente/{cliente_id}', 'ReservaController@crearReservaElegirCliente');
	Route::post('/abm-reserva', 'ReservaController@reservaABM');
	Route::get('/Reservas/editar/{id}', 'ReservaController@editarReserva');



	
	Route::get('/cabanias/listado', function () {
	    return view('cabanias/listado_de_cabanias');
	});	
	Route::post('/reservas/listado-de-cabanias', 'CabaniaController@listadoDeCabanias');
	
	Route::get('/reservas/listado', function () {
	    return view('reservas/listado_de_reservas');
	});	
	Route::post('/reservas/listado-de-reservas', 'ReservaController@listadoDeReservas');

	Route::get('/imagenes/{cabania_id}', 'CabaniaController@imagenesDeCabania');
	Route::post('/crearlistacabania', 'CabaniaController@crearListaCabania');
	Route::get('/imagenes-venta/{venta_id}', 'VentaController@imagenesDeVenta');
	Route::post('/crearlistaventa', 'VentaController@crearListaVenta');

	Route::get('/recibo-de-pago/{id}', 'ReservaController@reciboDePagoPrint');






	// RUTAS GENERICAS
	Route::get('/list/{gen_modelo}/{gen_opcion}', 'GenericController@index');


});


Auth::routes();

Route::get('/delcache', function () {
    $exitCode = Artisan::call('cache:clear');
    echo 'Cache Borrada';
});


//RUTAS VOUCHER Y RECIBOS
Route::get('/voucher-reserva/{id}/{hash}', 'ReservaController@voucherReservaPrint');
Route::get('/recibo-de-pago-cliente/{id}/{hash}', 'ReservaController@reciboDePagoClientePrint');

//RUTAS SITE
Route::get('/site/{empresa_id}', 'SiteController@index');
Route::get('/propiedad/{tipo}/{id}', 'SiteController@verPropiedad');


