<?php

use App\Http\Controllers\CoinsOutController;
use App\Http\Controllers\CoinsOutSaleController;
use App\Http\Controllers\ElectricityChargeController;
use App\Http\Controllers\SavingFundController;
use App\Http\Controllers\ShareholderController;
use App\Http\Controllers\ShopController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(ShopController::class)->group(function () {
    $routeName = '/shops';

    Route::get("$routeName", "index");
    Route::get("$routeName/{shop}", "show");
    Route::post("$routeName", "store");
    Route::put("$routeName/{shop}", "update");
    Route::delete("$routeName/{shop}", "destroy");
});


Route::controller(CoinsOutController::class)->group(function () {
    $routeName = '/coins-out';

    Route::get("$routeName/all/{shopId}", 'index');
    Route::get("$routeName/{id}", 'show');
    Route::post("$routeName/", 'store');
    Route::put("$routeName/{coinsOut}", 'update');
    Route::delete("$routeName/{coinsOut}", 'destroy');
});

Route::controller(CoinsOutSaleController::class)->group(function () {
    $routeName = '/coins-out-sale';

    Route::get("$routeName/all/{coinsOutId}", 'index');
    Route::get("$routeName/{id}", 'show');
    Route::post("$routeName/", 'store');
    Route::put("$routeName/{id}", 'update');
    Route::delete("$routeName/{id}", 'destroy');
});

Route::controller(ElectricityChargeController::class)->group(function () {
    $routeName = '/electricity-charge';

    Route::get("$routeName/all/{shopId}", 'index');
    Route::get("$routeName/{electricityCharge}", 'show');
    Route::post("$routeName/", 'store');
    Route::put("$routeName/{electricityCharge}", 'update');
    Route::delete("$routeName/{electricityCharge}", 'destroy');

});


Route::controller(SavingFundController::class)->group(function () {
    $routeName = '/saving-fund';

    Route::get("$routeName/all/{shopId}", 'index');
    Route::get("$routeName/{id}", 'show');
    Route::post("$routeName/", 'store');
    Route::put("$routeName/{id}", 'update');
    Route::delete("$routeName/{id}", 'destroy');
});

Route::controller(ShareholderController::class)->group(function () {
    $routeName = '/shareholder';

    Route::get("$routeName/all/{shopId}", 'index');
    Route::get("$routeName/{id}", 'show');
    Route::post("$routeName/", 'store');
    Route::put("$routeName/{id}", 'update');
    Route::put("$routeName/change-password/{id}", 'changePassword');
    Route::put("$routeName/change-email/{id}", 'changeEmail');
    Route::delete("$routeName/{id}", 'destroy');
});
