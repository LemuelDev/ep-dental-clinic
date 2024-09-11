<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::get('/signup', [AuthController::class, 'signup'])->name("signup");

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name("forgotPassword");





// admin

Route::get('/admin/appointments', [AdminController::class, 'getAppointments'])->name('admin.appointments');

Route::get('/admin/approvals', [AdminController::class, 'getApprovals'])->name('admin.approvals');

Route::get('/admin/activeUsers', [AdminController::class, 'getActiveUsers'])->name('admin.activeUsers');

Route::get('/admin/patientHistory', [AdminController::class, 'getPatientHistory'])->name('admin.patientHistory');

Route::get('/admin/profile', [AdminController::class, 'getProfile'])->name('admin.profile');