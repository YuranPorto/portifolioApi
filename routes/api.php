<?php

use App\Http\Controllers\PersonalInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/about', [PersonalInfoController::class, "index"])->name('index.about.api');
Route::get('/about/{id}', [PersonalInfoController::class, "show"])->name('show.about.api');
Route::post('/about/create', [PersonalInfoController::class, "store"])->name('create.about.api');
Route::put('/about/update/{id}', [PersonalInfoController::class, "update"])->name('update.about.api');
Route::delete('/about/delete/{id}', [PersonalInfoController::class, "destroy"])->name('delete.about.api');
