<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use Illuminate\Console\Scheduling\Event;

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
    return view('home');
});

Auth::routes();

Route::get('/', [EventController::class, 'index']);
Route::get('/home', [EventController::class, 'index'])->name('home');

Route::delete('/delete/{id}', [EventController::class, 'destroy'])->name('delete')-> middleware('isAdmin', 'auth');

Route::get('/create', [EventController::class, 'create'])->name('createEvent')->middleware('isAdmin', 'auth');
Route::post('/', [EventController::class, 'store'])->name('storeEvent');

Route::get('/show/{id}', [EventController::class, 'show'])->name('showEvent');

Route::get('/edit/{id}', [EventController::class, 'edit'])->name('editEvent')->middleware('isAdmin', 'auth');
Route::patch('/event/{id}', [EventController::class, 'update'])->name('updateEvent');

/* Route::get('slider', [SliderController::class, 'slider'])->name('sliderEvent');
 */
Route::get('/inscribe/{id}', [EventController::class, 'inscribe'])->name('inscribe')->middleware('auth');
Route::get('/cancelInscription/{id}', [EventController::class, 'cancelInscription'])->name('cancelInscription')->middleware('auth');

Route::get('/eventRegistered', [EventController::class, 'eventRegistered'])->name('eventRegistered')->middleware('auth');

