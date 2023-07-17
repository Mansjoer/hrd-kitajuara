<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StructuralController;

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

Route::controller(AuthController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::post('/auth/login', 'login')->name('app-auth-login');
    });
    Route::middleware(['auth'])->group(function () {
        Route::get('/auth/logout', 'logout')->name('app-auth-logout');
    });
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('app-dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employees', 'index')->name('app-employees');
        Route::get('/employees/create', 'create')->name('app-employees-create');
        Route::post('/employees/post-create', 'postcreate')->name('app-employees-post-create');
        Route::get('/employees/edit/{slug}', 'edit')->name('app-employees-edit');
        Route::post('/employees/update/{slug}', 'update')->name('app-employees-update');
        Route::post('/employees/delete', 'delete')->name('app-employees-delete');
        Route::get('/employees/download-format', 'downloadFormat')->name('app-download-format-employees');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/my-profile', 'myProfile')->name('app-my-profile');
        Route::post('/my-profile-change-photo', 'myProfileChangePhoto')->name('app-my-profile-change-photo');
        Route::get('/my-profile/change-password', 'myProfileChangePassword')->name('app-my-profile-change-password');

        Route::get('/users/profile/{slug}', 'profile')->name('app-users-profile');
        Route::get('/users/profile/{slug}/attendance', 'attendance')->name('app-users-profile-attendance');
        Route::get('/users/profile/{slug}/change-password', 'changePassword')->name('app-users-profile-change-password');
        Route::post('/users/profile/{slug}/change-photo', 'profileChangePhoto')->name('app-users-profile-change-photo');

        Route::post('/post/change-password', 'postChangePassword')->name('app-post-change-password');
        Route::post('/post/reset-password', 'postResetPassword')->name('app-post-reset-password');
    });

    Route::controller(StructuralController::class)->group(function () {
        Route::get('/structural', 'index')->name('app-structural');
        // Route::get('/structural/edit/{slug}', 'update')->name('app-structural-update');
        Route::get('/structural/edit/departement/{slug}', 'updateDepartements')->name('app-structural-departements-update');
        Route::get('/structural/edit/sub-departements/{slug}', 'updateSubDepartements')->name('app-structural-update');
    });

    Route::controller(ExcelController::class)->group(function () {
        Route::get('/export/employees/excel', 'exportEmployeesExcel')->name('app-export-excel-employees');
        Route::get('/export/employees/csv', 'exportEmployeesCsv')->name('app-export-csv-employees');
        Route::post('/import/employees', 'importEmployees')->name('app-import-employees');
    });
});
