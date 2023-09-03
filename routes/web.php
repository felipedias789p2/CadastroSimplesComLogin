<?php

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
    return view('auth.login');
});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::get('/create', 'StockController@create')->name('stocks.create');
    Route::get('/show/{id}', 'StockController@show')->name('stocks.show');
    Route::delete('/delete/{id}', 'StockController@destroy')->name('stocks.destroy');
    Route::put('/update', 'StockController@update')->name('stocks.update');
    Route::get('/index', 'StockController@index')->name('stocks.index');
    Route::post('/store', 'StockController@store')->name('stocks.store');
    Route::get('/edit/{id}', 'StockController@edit')->name('stocks.edit');
    Route::any('pecas/filtrar', 'StockController@search')->name('searc');
});

require __DIR__ . '/auth.php';
