<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventFormController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [EventFormController::class, 'showForm'])->name('event-form');
Route::post('/event-form', [EventFormController::class, 'submitForm']);

Route::get('/dash', [EventFormController::class, 'index'])->name('home');
Route::get('/event/{id}', [EventFormController::class, 'showEvent'])->name('event.show');