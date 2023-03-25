<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PatientRegistrationController;
use App\Http\Controllers\GuestRegistrationController;
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

    //Get All Patients
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    
    // Create patient
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    
    // Store patient
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');

    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    
    Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
    
    Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');
    
    // Get Calendar
    Route::get('/calendar', [EventController::class, 'index'])->name('calendar');

});

// Guest Registration
Route::get('/guest/guest-register', [GuestRegistrationController::class, 'index'])->name('guest.register');
Route::post('/guest/guest-register', [GuestRegistrationController::class, 'store'])->name('guest.register.store');
Route::get('/guest/guest-success', function () {
    return view('/guest/guest-success');
})->name('guest.success');






