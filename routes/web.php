<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\EmployeeAuthController;

// Employee Authentication Routes
Route::get('/employee/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login');
Route::post('/employee/login', [EmployeeAuthController::class, 'login'])->name('employee.login');
Route::post('/employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');

// Protected Routes with Role-Based Access
Route::middleware(['auth:employee'])->group(function () {
    // Home page for employees
    Route::get('/', [EmployeeAuthController::class, 'showHome'])->name('home'); // Updated to use a method or keep as closure
    Route::get('/employee/dashboard', function () {
        return view('employee.dashboard');
    })->name('employee.dashboard');
    Route::get('/owner/dashboard', function () {
        return view('owner.dashboard');
    })->name('owner.dashboard');
    Route::resource('medicines', MedicineController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('prescriptions', PrescriptionController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::get('/sales-report', [SaleController::class, 'report'])->name('sales.report');
});

// Optional: Add showHome method if using a controller method
/*
use App\Http\Controllers\EmployeeAuthController;

Route::get('/', [EmployeeAuthController::class, 'showHome'])->name('home');

public function showHome()
{
    return view('home');
}
*/