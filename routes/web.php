<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('inicio');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

/* Route::get('{file}', function ($file) {
    return Storage::response("$file");
}); */

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/data', 'DashboardController@dataDashboard')->name('dashboard.dataDashboard');

    Route::get('/empleado','EmpleadosController@index')->name('empleado.index');
    Route::post('/empleado','EmpleadosController@store')->name('empleado.store');
    Route::get('/empleado/add','EmpleadosController@create')->name('empleado.create');
    Route::get('/empleado/{id}/edit','EmpleadosController@edit')->name('empleado.edit');
    Route::put('/empleado/{id}','EmpleadosController@update')->name('empleado.update');
    Route::delete('/empleado/{id}','EmpleadosController@destroy')->name('empleado.destroy');



    Route::get('/compañia', 'CompaniaController@index')->name('compañia.index');
    Route::get('/compañia/add', 'CompaniaController@create')->name('compañia.create');
    Route::post('/compañia', 'CompaniaController@store')->name('compañia.store');
    Route::get('/compañia/{id}/edit', 'CompaniaController@edit')->name('compañia.edits');
    Route::put('/compañia/{id}', 'CompaniaController@update')->name('compañia.update');
    Route::delete('/compañia/{id}', 'CompaniaController@destroy')->name('compañia.destroy');

    
});