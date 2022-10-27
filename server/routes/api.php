<?php

use App\Http\Controllers\CoinsOutController;
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

	Route::get("$routeName/{id}", 'index');
});
