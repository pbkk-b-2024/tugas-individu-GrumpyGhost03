<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RoleHasPermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CarServiceAppointmentController;
use App\Http\Controllers\CarSaleController;
use App\Http\Controllers\ServiceRecordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\CarServiceAppointment;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaintenanceScheduleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServicePartController;

// Route for the homepage
Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

// Authentication routes
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User CRUD routes
Route::resource('users', UserController::class);

// Admin Users route
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

// Resource routes for cars
Route::resource('cars', CarController::class);
Route::get('/cars', [CarController::class, 'userView'])->name('cars.user'); // For normal users
Route::get('/admin/cars', [CarController::class, 'adminView'])->name('cars.admin'); // For admins

// Resource routes for services
Route::resource('services', ServiceController::class);
Route::get('/services', [ServiceController::class, 'userView'])->name('services.user'); // For normal users
Route::get('/admin/services', [ServiceController::class, 'adminView'])->name('services.admin'); // For admins



// Display all appointments for admin
Route::get('/appointments/admin', [CarServiceAppointmentController::class, 'adminAppointment'])->name('appointments.adminView');

// Show form for creating a new appointment
Route::get('/appointments/create', [CarServiceAppointmentController::class, 'create'])->name('appointments.create');

// GET: Show user appointments or create form
Route::get('/appointments', [CarServiceAppointmentController::class, 'userAppointment'])->name('appointments.userView');

// POST: Store a new appointment
Route::post('/appointments', [CarServiceAppointmentController::class, 'store'])->name('appointments.store');


// Show form for editing an existing appointment
Route::get('/appointments/{id}/edit', [CarServiceAppointmentController::class, 'edit'])->name('appointments.edit');

// Update an existing appointment
Route::put('/appointments/{id}', [CarServiceAppointmentController::class, 'update'])->name('appointments.update');

// Delete an appointment
Route::delete('/appointments/{id}', [CarServiceAppointmentController::class, 'destroy'])->name('appointments.destroy');

// Sales routes
    Route::prefix('admin/sales')->group(function () {
        Route::get('/', [CarSaleController::class, 'adminIndex'])->name('sales.adminIndex');
        Route::get('/create', [CarSaleController::class, 'create'])->name('sales.create');
        Route::post('/', [CarSaleController::class, 'store'])->name('sales.store');
        Route::get('/{id}/edit', [CarSaleController::class, 'edit'])->name('sales.edit');
        Route::put('/{id}', [CarSaleController::class, 'update'])->name('sales.update');
        Route::delete('/{id}', [CarSaleController::class, 'destroy'])->name('sales.destroy');
    });


    Route::prefix('admin/maintenance')->group(function () {
        Route::get('/', [MaintenanceScheduleController::class, 'index'])->name('maintenance.admin_maintenance');
        Route::get('/create', [MaintenanceScheduleController::class, 'create'])->name('maintenance.create');
        Route::post('/', [MaintenanceScheduleController::class, 'store'])->name('maintenance.store');
        Route::get('/{id}/edit', [MaintenanceScheduleController::class, 'edit'])->name('maintenance.edit');
        Route::put('/{id}', [MaintenanceScheduleController::class, 'update'])->name('maintenance.update');
        Route::delete('/{id}', [MaintenanceScheduleController::class, 'destroy'])->name('maintenance.destroy');
    });
    
// Service Records CRUD routes
Route::resource('service_records', ServiceRecordController::class);
Route::get('/admin/service-records', [ServiceRecordController::class, 'adminIndex'])->name('service_records.adminIndex');

// Invoice CRUD routes
Route::resource('invoices', InvoiceController::class);
Route::get('/admin/invoices', [InvoiceController::class, 'index'])->name('invoices.adminIndex');

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.admin'); // Display all customers
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create'); // Show create form
    Route::post('/', [CustomerController::class, 'store'])->name('customers.store'); // Store new customer
    Route::get('/{id}', [CustomerController::class, 'show'])->name('customers.show'); // Display specific customer details
    Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit'); // Show edit form
    Route::put('/{id}', [CustomerController::class, 'update'])->name('customers.update'); // Update customer
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy'); // Delete customer
});


// Route to display all service parts (admin index)
Route::get('admin/service-parts', [ServicePartController::class, 'index'])->name('service_parts.index');

// Route to show the form for creating a new service part
Route::get('service-parts/create', [ServicePartController::class, 'create'])->name('service_parts.create');

// Route to store a new service part
Route::post('service-parts', [ServicePartController::class, 'store'])->name('service_parts.store');

// Route to show the form for editing a service part
Route::get('service-parts/{id}/edit', [ServicePartController::class, 'edit'])->name('service_parts.edit');

// Route to update an existing service part
Route::put('service-parts/{id}', [ServicePartController::class, 'update'])->name('service_parts.update');

// Route to delete a specific service part
Route::delete('service-parts/{id}', [ServicePartController::class, 'destroy'])->name('service_parts.destroy');

Route::get('user/service-parts', [ServicePartController::class, 'userview'])->name('service_parts.user');

