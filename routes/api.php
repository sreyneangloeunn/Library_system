<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;

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



Route::get('library', [LibraryController::class, 'index']);
Route::post('library', [LibraryController::class, 'store']);
Route::put('library/{id}', [LibraryController::class, 'update']);
Route::patch('library/{id}', [LibraryController::class, 'update']);
Route::delete('library/{id}', [LibraryController::class, 'destroy']);

