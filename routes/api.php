<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\BeeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('plants')->group(function () {
    Route::post('/store', [PlantsController::class, 'store'])->name('storePlants');
    Route::post('/filter', [PlantsController::class, 'filter'])->name('filterPlants');
});

Route::prefix('bee')->group(function () {
    Route::get('/', [BeeController::class, 'index'])->name('getBee');
});

