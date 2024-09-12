<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
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

Route::get('/admin/appointments', [AdminController::class, 'getAppointments'])->name('admin.appointments');

Route::get('/admin/approvals', [AdminController::class, 'getApprovals'])->name('admin.approvals');

Route::get('/admin/activeUsers', [AdminController::class, 'getActiveUsers'])->name('admin.activeUsers');

Route::get('/admin/patientHistory', [AdminController::class, 'getPatientHistory'])->name('admin.patientHistory');

Route::get('/admin/profile', [AdminController::class, 'getProfile'])->name('admin.profile');


Route::get('/patient/appointments', [PatientController::class, 'getAppointments'])->name('patient.appointments');

Route::get('/patient/patientHistory', [PatientController::class, 'getTreatmentHistory'])->name('patient.treatmentHistory');

Route::get('/patient/profile', [PatientController::class, 'getProfile'])->name('patient.profile');