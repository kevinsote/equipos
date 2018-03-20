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
	$pagos = \App\Pagos::todos();
    return view('welcome', compact('pagos'));
});

Auth::routes();

Route::any('/home', 'HomeController@index')->name('home');

//EMPLEADOS
Route::any('/int_alta', 'EmpleadoController@alta')->name('alta_integrantes');
Route::any('/int_tabla', 'EmpleadoController@tabla')->name('tabla_integrantes');
Route::any('/int_store', 'EmpleadoController@store')->name('guardar_integrante');
Route::any('/int_upda', 'EmpleadoController@modificar')->name('modificar_integrante');
Route::any('/int_update', 'EmpleadoController@update')->name('update_integrante');
Route::any('/int_del', 'EmpleadoController@eliminar')->name('eliminar_integrante');

//EQUIPOS
Route::any('/equ_alta', 'EquipoController@alta')->name('alta_equipos');
Route::any('/equ_tabla', 'EquipoController@tabla')->name('tabla_equipos');
Route::any('/equ_store', 'EquipoController@store')->name('guardar_equipo');
Route::any('/equ_upda', 'EquipoController@modificar')->name('modificar_equipo');
Route::any('/equ_update', 'EquipoController@update')->name('update_equipo');
Route::any('/equ_del', 'EquipoController@eliminar')->name('eliminar_equipo');

//DEPARTAMENTOS
Route::any('/dep_alta', 'DepartamentoController@alta')->name('alta_departamentos');
Route::any('/dep_tabla', 'DepartamentoController@tabla')->name('tabla_departamentos');
Route::any('/dep_store', 'DepartamentoController@store')->name('guardar_departamento');
Route::any('/dep_upda', 'DepartamentoController@modificar')->name('modificar_departamento');
Route::any('/dep_update', 'DepartamentoController@update')->name('update_departamento');
Route::any('/dep_del', 'DepartamentoController@eliminar')->name('eliminar_departamento');

//PAGOS
Route::any('/pag_tabla', 'PagoController@tabla')->name('tabla_pagos');
Route::any('/pag_upda', 'PagoController@modificar')->name('modificar_pago');
Route::any('/pag_update', 'PagoController@update')->name('update_pago');


Route::any('/user', function(){
	return view ('user');
});

//pa cargar el excel
Route::any('importExcel', 'MaatwebsiteDemoController@importExcel')->name('carga_excel');
Route::get('downloadExcel', 'MaatwebsiteDemoController@downloadExcel')->name('descarga_excel');




