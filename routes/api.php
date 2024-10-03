<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\MaintenanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('employees', EmployeeController::class);
Route::resource('customers', CustomerController::class);
Route::resource('products', ProductController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('equipment', EquipmentController::class);
Route::resource('rentals', RentalController::class);
Route::resource('maintenances', MaintenanceController::class);
Route::resource('payments', PaymentController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('materials', MaterialController::class);
Route::resource('productions', ProductionController::class);
Route::resource('orders', OrderController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('deliveries', DeliveryController::class);

