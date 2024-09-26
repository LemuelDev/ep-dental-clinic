<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
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

Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('password/reset', [PasswordResetController::class, 'showLinkRequestForm'])
    ->name('password.request');

// Handle sending the password reset link
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])
    ->name('password.email');

// Show the form to reset the password
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])
    ->name('password.reset');

// Handle the password reset form submission
Route::post('password/reset/', [PasswordResetController::class, 'reset'])
    ->name('password.update');



// admin



Route::get('/admin/appointments', [AdminController::class, 'getAppointments'])->name('admin.appointments');

Route::get('/admin/approvals', [AdminController::class, 'getApprovals'])->name('admin.approvals');

Route::get('/admin/approvals/{id}', [AdminController::class, 'trackApproval'])->name('admin.trackApproval');

Route::get('/admin/approvals/{id}/approve', [AdminController::class, 'approveUser'])->name('admin.approveUser');

Route::get('/admin/activeUsers', [AdminController::class, 'getActiveUsers'])->name('admin.activeUsers');

Route::get('/admin/disabledUsers', [AdminController::class, 'getDisableUsers'])->name('admin.disabledUsers');

Route::get('/admin/activeUsers/{id}', [AdminController::class, 'trackUser'])->name('admin.trackUser');

Route::get('/admin/patientHistory', [AdminController::class, 'getPatientHistory'])->name('admin.patientHistory');

Route::get('/admin/patientHistory/no-show', [AdminController::class, 'noShowHistory'])->name('admin.noShow');

Route::get('/admin/profile/edit/{id}', [AdminController::class, 'editProfile'])->name('admin.editProfile');

Route::post('/admin/profile/update/{id}', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

Route::get('/admin/profile', [AdminController::class, 'getProfile'])->name('admin.profile');

Route::get('/admin/activeUsers/enable/{id}', [AdminController::class, 'enableUser'])->name("admin.enable");

Route::get('/admin/activeUsers/disable/{id}', [AdminController::class, 'disableUser'])->name("admin.disable");

Route::get('/admin/appointments/view/{id}' , [AdminController::class, 'trackReservation'])->name("admin.trackReservation");

Route::get('/admin/appointments/approve/{id}', [AdminController::class, "approveReservation"])->name("admin.approveReservation");

Route::get('/admin/appointments/reject/{id}', [AdminController::class, "rejectReservation"])->name("admin.rejectReservation");


// patient

Route::get('/patient/reservations', [PatientController::class, 'getReservations'])->name('patient.reservations');

Route::get('/patient/reservation/create', [PatientController::class, 'createReservations'])->name('patient.create');

Route::post('/patient/reservation/post', [ReservationController::class, 'store'])->name('patient.store');

Route::get('/patient/patientHistory', [PatientController::class, 'getTreatmentHistory'])->name('patient.treatmentHistory');

Route::get('/patient/profile', [PatientController::class, 'getProfile'])->name('patient.profile');

Route::get('/patient/profile/edit/{id}', [PatientController::class, 'editProfile'])->name('patient.editProfile');

Route::post('/patient/profile/update/{id}', [PatientController::class, 'updateProfile'])->name('patient.updateProfile');