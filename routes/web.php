<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ProfileController;
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

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employees', 'index')->name('app-employees');
    Route::get('/employees/create', 'create')->name('app-employees-create');
    Route::post('/employees/post-create', 'postcreate')->name('app-employees-post-create');
    Route::get('/employees/edit/{slug}', 'edit')->name('app-employees-edit');
    Route::post('/employees/update/{slug}', 'update')->name('app-employees-update');
    Route::post('/employees/delete', 'delete')->name('app-employees-delete');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/users/profile/{slug}', 'profile')->name('app-users-profile');
    Route::get('/users/profile/{slug}/attendance', 'attendance')->name('app-users-profile-attendance');
});

Route::controller(Controller::class)->group(function () {
    Route::get('/structure', 'structure')->name('app-structure');
});

Route::controller(ExcelController::class)->group(function () {
    // Route::get('/export/employees/pdf', 'exportEmployeesPdf')->name('app-export-pdf-employees');
    Route::get('/export/employees/excel', 'exportEmployeesExcel')->name('app-export-excel-employees');
    Route::get('/export/employees/csv', 'exportEmployeesCsv')->name('app-export-csv-employees');
    Route::post('/import/employees', 'importEmployees')->name('app-import-employees');
});
