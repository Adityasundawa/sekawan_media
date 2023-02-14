<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::get('redirect', [AuthController::class, 'redirect'])->name('auth.redirect');
Route::post('rental/add', [OrderController::class, 'rental_add'])->name('add.rental');  
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/export/order', [ExcelController::class, 'export']);
    Route::group(['middleware' => 'role:administrator', 'prefix' => 'administrator', 'as' => 'administrator.'], function () {
        Route::get('index', [AdministratorController::class, 'index'])->name('admin.index');
        
        Route::get('vehicle', [VehicleController::class, 'vehicle'])->name('admin.vehicle');
        Route::post('vehicle/add', [VehicleController::class, 'vehicle_add'])->name('add.vehicle');
        Route::get('vehicle/edit/{id}', [VehicleController::class, 'vehicle_edit'])->name('edit.vehicle');
        Route::get('vehicle/delete/{id}', [VehicleController::class, 'vehicle_delete'])->name('delete.vehicle');


        Route::get('drivers', [DriversController::class, 'drivers'])->name('admin.index');  
        Route::get('drivers/edit/{id}', [DriversController::class, 'drivers_edit'])->name('drivers.edit');  
        Route::get('drivers/delete/{id}', [DriversController::class, 'drivers_delete'])->name('add.driver');            
        Route::post('drivers/add', [DriversController::class, 'drivers_add'])->name('add.driver'); 
        
        
        Route::get('rental', [OrderController::class, 'rental'])->name('order.rental');  
        Route::post('rental/add', [OrderController::class, 'rental_add'])->name('add.rental');  
        Route::get('rental/accept/{id}', [OrderController::class, 'rental_accept'])->name('accept.rental');  
        Route::get('rental/decline/{id}', [OrderController::class, 'rental_decline'])->name('decline.rental');  
    });
    Route::group(['middleware' => 'role:agreement', 'prefix' => 'agreement', 'as' => 'superadmin.'], function () {
        Route::get('index', [AgreementController::class, 'index'])->name('index');
        Route::get('rental', [OrderController::class, 'rental'])->name('order.rental');  
        Route::post('rental/add', [OrderController::class, 'rental_add'])->name('add.rental');  
        Route::get('rental/accept/{id}', [OrderController::class, 'rental_accept'])->name('accept.rental');  
        Route::get('rental/decline/{id}', [OrderController::class, 'rental_decline'])->name('decline.rental');
    });
  
});
