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
    Route::get('/', [PlantsController::class, 'listAll'])->name('getAllPlants');
    Route::post('/store', [PlantsController::class, 'store'])->name('storePlants');
    Route::put('/update/{plantsId}', [PlantsController::class, 'update'])->name('updatePlants');
    Route::delete('/delete/{plantsId}', [PlantsController::class, 'destroy'])->name('deletePlants');

    Route::post('/filter', [PlantsController::class, 'filter'])->name('filterPlants');
});

Route::prefix('bee')->group(function () {
    Route::get('/', [BeeController::class, 'index'])->name('getBee');
    Route::post('/store', [BeeController::class, 'store'])->name('storeBee');
    Route::put('/update/{beeId}', [BeeController::class,'update'])->name('updateBee');
    Route::delete('/delete/{beeId}',[BeeController::class,'destroy'])->name('deleteBee');
});

