<?php
use App\Http\Controllers\EtudiantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


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

/* Route::get('/etudiants', [EtudiantController::class, 'index']);

Route::get('/etudiants/{id}', [EtudiantController::class, 'show']);

Route::post('/etudiants', [EtudiantController::class, 'store']);

Route::put('/etudiants/{id}', [EtudiantController::class, 'update']);

Route::delete('/etudiants/{id}', [EtudiantController::class, 'destroy']); */

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('etudiants', App\Http\Controllers\API\EtudiantAPIController::class)
        ->except(['create', 'edit']);
});

    Route::resource('sessions', App\Http\Controllers\API\SessionsAPIController::class)
        ->except(['create', 'edit']);

Route::post('/login', [RegisterController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
