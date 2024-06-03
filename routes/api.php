<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\FormationCategorieController;
use App\Http\Controllers\FormationController;
use App\Models\FormationCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NosClientController;
use App\Http\Controllers\UserController;

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
Route::get('/categories',[FormationCategorieController::class,'index']);
Route::get('/categorie/{id}',[FormationCategorieController::class,'show']);
Route::post('/formation/create',[FormationController::class,'store']);

Route::get('/info',[InfoController::class,'info'])->name('info');
Route::post('/info',[InfoController::class,'store'])->name('info.store');

Route::post('/nosclient',[NosClientController::class,'store']);

// formatio apis
// Route::get('/formations',[FormationController::class,'index']);
// Route::delete('/formation/{id}',[]);
// Route::controller(AuthController::class)->group(function(){
//     Route::post('/login','login');
//     Route::get('/user','user');
//     Route::get('/logout','logout');

// });

Route::middleware(['web'])->group(function () {
    Route::controller(AuthController::class)->group(function(){
        Route::post('/login','login');
        Route::get('/user','user');
        Route::get('/logout','logout');
    });
});

Route::controller(FormationController::class)->group(function(){
    Route::get('/formations','index');
    Route::get('/formation/{id}','create');
    Route::delete('/formation/{id}','destroy');
    Route::get('/formation/{id}/program','show');
});
Route::controller(UserController::class)->group(function(){
    Route::get('/users','index');
    Route::post('/user/{id}/block','block');

});
Route::controller(DemandeController::class)->group(function(){
    Route::get('/demandes','index');
    // Route::post('/user/{id}/block','block');

});
Route::controller(MessageController::class)->group(function(){
    Route::get('/messages','index');
    Route::post('/message','store');
});

