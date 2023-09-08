<?php

use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TechnologiesController;
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

//about
Route::get('/about', [PersonalInfoController::class, "index"])->name('index.about.api');
Route::get('/about/{id}', [PersonalInfoController::class, "show"])->name('show.about.api');
Route::post('/about/create', [PersonalInfoController::class, "store"])->name('create.about.api');
Route::put('/about/update/{id}', [PersonalInfoController::class, "update"])->name('update.about.api');
Route::delete('/about/delete/{id}', [PersonalInfoController::class, "destroy"])->name('delete.about.api');

// technologies
Route::delete('/technologies/delete/{id}', [TechnologiesController::class, "destroy"])->name('delete.technologies.api');
Route::put('/technologies/update/{id}', [TechnologiesController::class, "update"])->name('update.technologies.api');
Route::post('/technologies/create', [TechnologiesController::class, "store"])->name('create.technologies.api');
Route::get('/technologies/{id}', [TechnologiesController::class, "show"])->name('show.technologies.api');
Route::get('/technologies', [TechnologiesController::class, "index"])->name('index.technologies.api');

// social
Route::delete('/social/delete/{id}', [SocialController::class, "destroy"])->name('delete.social.api');
Route::put('/social/update/{id}', [SocialController::class, "update"])->name('update.social.api');
Route::post('/social/create', [SocialController::class, "store"])->name('create.social.api');
Route::get('/social/{id}', [SocialController::class, "show"])->name('show.technologies.api');
Route::get('/social', [SocialController::class, "index"])->name('index.social.api');