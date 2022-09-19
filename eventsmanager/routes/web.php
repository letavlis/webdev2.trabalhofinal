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
    return view('welcome');
})->name('index');

Route::get('/dashboard', function () {
    return view('templates.main')->with('titulo', "");
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::resource('events', '\App\Http\Controllers\EventsController');
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
});


require __DIR__.'/auth.php';
