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
    return view('users.home');
})->name('Home');

Route::get('/dashboard', function () {
    return view('users.dashboard');
} )->name('Dashboard');

Route::get('/producto', function () {
    return view('users.producto');
});
Route::get('/reservas', function () {
    return view('users.reservas');
});