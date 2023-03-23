<?php

use App\Http\Controllers\PatientController;
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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/patients', function () {
        return view('pages.patients.patients');
    })->name('patients');
    
    Route::get('/patients/create', [App\Http\Controllers\PatientController::class, 'create'])->name('patients.create');
    
    Route::post('/patients', [App\Http\Controllers\PatientController::class, 'store'])->name('patients-submit');

    Route::get('/calendar', function () {
        return view('pages.calendar');
    })->name('calendar');
});



