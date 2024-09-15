<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

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


// login, signup, forgot-pass, reset-pass....

Route::get('/', [AuthController::class, 'login'])->name("login");

Route::post('/auth', [AuthController::class , 'authenticate'])->name("user.auth");

Route::get('/signup', [AuthController::class, 'signup'])->name("signup");

Route::post('/signup', [AuthController::class,'store'])->name('users.store');

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name("forgotPassword");

Route::post('/logout', [AuthController::class , 'logout'])->name('logout');



// admin


Route::get('/admin/appointments/Calendar', [AdminController::class, 'getCalendar'])->name('admin.calendar');

Route::get('/admin/appointments', [AdminController::class, 'getAppointments'])->name('admin.appointments');

Route::get('/admin/activeUsers', [AdminController::class, 'getActiveUsers'])->name('admin.activeUsers');

Route::get('/admin/patientHistory', [AdminController::class, 'getPatientHistory'])->name('admin.patientHistory');

Route::get('/admin/profile', [AdminController::class, 'getProfile'])->name('admin.profile');

Route::get('/admin/activeUsers/enable/{id}', [AdminController::class, 'enableUser'])->name("admin.enable");

Route::get('/admin/activeUsers/disable/{id}', [AdminController::class, 'disableUser'])->name("admin.disable");

Route::get('/admin/appointments/view/{id}' , [AdminController::class, 'trackReservation'])->name("admin.trackReservation");


// patient

Route::get('/patient/appointments/Calendar', [PatientController::class, 'getCalendar'])->name('patient.calendar');

Route::get('/patient/reservations', [PatientController::class, 'getReservations'])->name('patient.reservations');

Route::get('/patient/reservation/create', [PatientController::class, 'createReservations'])->name('patient.create');

Route::post('/patient/reservation/create', [ReservationController::class, 'store']);

Route::get('/patient/patientHistory', [PatientController::class, 'getTreatmentHistory'])->name('patient.treatmentHistory');

Route::get('/patient/profile', [PatientController::class, 'getProfile'])->name('patient.profile');