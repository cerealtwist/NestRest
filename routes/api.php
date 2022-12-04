<?php


use App\Http\Controllers\API\Auth\AdminAuthController;
use App\Http\Controllers\API\Auth\CustomerAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User Login & Register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/customer/login', [CustomerAuthController::class, 'login']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Admin Routes
Route::middleware(['auth:sanctum', 'type.admin'])->group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Api'], function() {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::apiResource('hotels', HotelController::class);
    Route::apiResource('rooms', RoomController::class);

    Route::post('invoices/bulk', ['uses'=>'InvoicesController@bulkStore']);
});

// Customer Routes
Route::middleware(['auth:sanctum', 'type.customer'])->group(['prefix' => 'customer', 'namespace' => 'App\Http\Controllers\Api'], function() {

});
