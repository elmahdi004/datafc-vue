<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormationCategorieController;
use App\Http\Controllers\FormationController;
use App\Models\FormationCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NosClientController;

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
Route::get('/user',[AuthController::class,'user']);
Route::get('/categories',[FormationCategorieController::class,'index']);
Route::post('/formation/create',[FormationController::class,'store']);

Route::get('/info',[InfoController::class,'info'])->name('info');
Route::post('/info',[InfoController::class,'store'])->name('info.store');

Route::post('/nosclient',[NosClientController::class,'store']);

// formatio apis
// Route::get('/formations',[FormationController::class,'index']);
// Route::delete('/formation/{id}',[]);

Route::controller(FormationController::class)->group(function(){
    Route::get('/formations','index');
    Route::delete('/formation/{id}','destroy');
    Route::get('/formation/{id}/program','show');
});

