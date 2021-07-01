<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\SuperAdmin\RegisteredSuperAdminController;
use App\Http\Controllers\SuperAdmin\AuthenticatedSessionSuperAdminController;
use App\Http\Controllers\Employee\RegisteredEmployeeController;
use App\Http\Controllers\Employee\AuthenticatedSessionEmployeeController;

use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');



// Superadmin

Route::prefix('/superadmin')->name('superadmin.')->group(function(){

        Route::get('/register', [RegisteredSuperAdminController::class, 'createSuperadmin'])
                ->middleware('guest:superadmin')
                ->name('register');

        Route::post('/register', [RegisteredSuperAdminController::class, 'storeSuperAdmin'])
                ->middleware('guest:superadmin');

        Route::get('/login', [AuthenticatedSessionSuperAdminController::class, 'createSuperadmin'])
                ->middleware('guest:superadmin')
                ->name('login');

        Route::post('/login', [AuthenticatedSessionSuperAdminController::class, 'store'])
                ->middleware('guest:superadmin');

        Route::post('/logout', [AuthenticatedSessionSuperAdminController::class, 'destroy'])
                ->middleware('auth:superadmin')
                ->name('logout');

});


// Employee

Route::prefix('/employee')->name('employee.')->group(function(){

        Route::get('/register', [RegisteredEmployeeController::class, 'createEmployee'])
                ->middleware('guest:employee')
                ->name('register');

        Route::post('/register', [RegisteredEmployeeController::class, 'storeEmployee'])
                ->middleware('guest:employee');

        Route::get('/login', [AuthenticatedSessionEmployeeController::class, 'createEmployee'])
                ->middleware('guest:employee')
                ->name('login');

        Route::post('/login', [AuthenticatedSessionEmployeeController::class, 'store'])
                ->middleware('guest:employee');

        Route::post('/logout', [AuthenticatedSessionEmployeeController::class, 'destroy'])
                ->middleware('auth:employee')
                ->name('logout');
});


