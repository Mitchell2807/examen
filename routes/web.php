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
//welkomstpagina
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//homepagina
Route::get('/home', 'HomeController@index')->name('home');


//verwijzing naar delete methode binnen de controller van de reserveringen.
Route::get('/reservations/{reservation}/delete', 'ReservationsController@delete')
->name('reservations.delete');
//reserveringscontroller
Route::resource('/reservations', 'ReservationsController');

//moviescontroller
Route::resource('/movies', 'MoviesController');

//userscontroller
Route::resource('/users', 'UsersController');


//routes voor middleware
Route::group(['middleware' => ['role:admin|customer']], function () {
    Route::get('/reservations/{reservation}/delete', 'ReservationsController@delete')
    ->name('reservations.delete');
    Route::resource('/reservations', 'ReservationsController');
});
