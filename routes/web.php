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

Route::get('/print', function () {
    return view('print');
});

// Route::get('/admin', 'AdminController@index')->name('admin');
// Route::get('/admin/create', 'AdminController@create');

Route::resource('admin', 'AdminController');
// Route::put('admin/{id}','AdminController@edit');

Route::get('/guest', 'GuestController@index')->name('guest');
Route::delete('guests/{id}','GuestController@destroy');
Route::get('/guest/{id}','GuestController@show');

// Route::get('/print','GuestController@showGuest')->name('showGuest');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@createChat')->name('home.createChat');
Route::post('/home','HomeController@sendNotification')->name('sendNotification');

Route::get('/chat', 'HomeController@chat')->name('chat');

Route::get('/guestroom', 'HomeController@guestroom')->name('guestroom');

// Route::put('/AdminUpdate', 'AdminController@AdminUpdate')->name('AdminUpdate');
