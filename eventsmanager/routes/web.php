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
    Route::get('/student', 'UserController@student')->name('users.student');
    Route::get('/planner', 'UserController@planner')->name('users.planner');
    Route::resource('users','UserController');
    Route::resource('attendees', 'AttendeeController');
    Route::get('attendees/{attendee}/creater', 'AttendeeController@creater')->name('attendees.creater');
});

Route::get('/eventslist', 'EventsController@list')->name('events.list');

require __DIR__.'/auth.php';
