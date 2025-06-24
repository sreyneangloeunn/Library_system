<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MemberController;
use App\Models\Book;

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


Route::apiResource('categories', CategoryController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('loans', LoansController::class);
Route::apiResource('members', MemberController::class);
Route::apiResource('libraries', LibraryController::class);

// Route::get('libraries', [LibraryController::class, 'index']);
// Route::post('libraries', [LibraryController::class, 'store']);
// Route::put('libraries/{id}', [LibraryController::class, 'update']);
// Route::patch('libraries/{id}', [LibraryController::class, 'update']);
// Route::delete('libraries/{id}', [LibraryController::class, 'destroy']);



