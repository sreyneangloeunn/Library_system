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

Route::get('library', [LibraryController::class, 'index']);
Route::post('library', [LibraryController::class, 'store']);
Route::put('library/{id}', [LibraryController::class, 'update']);
Route::patch('library/{id}', [LibraryController::class, 'update']);
Route::delete('library/{id}', [LibraryController::class, 'destroy']);



