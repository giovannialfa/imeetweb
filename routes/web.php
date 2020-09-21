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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/countVisitor', 'HomeController@countVisitor')->name('countVisitor');

Route::get('/riwayat', 'RiwayatController@index');
Route::get('/riwayat/{id}/edit','RiwayatController@edit');
Route::get('/riwayat/{id}/show','RiwayatController@show');
Route::delete('/riwayat/{id}','RiwayatController@destroy');

Route::get('/admin', function () {
    return view('admin.admin');
});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::post('/home', 'HomeController@createChat')->name('home.createChat');

Route::get('/chat', 'HomeController@chat')->name('chat');

Route::get('/guestroom', 'HomeController@guestroom')->name('guestroom');
