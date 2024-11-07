<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('book_category')->group(function () {
    Route::get('/', [BookCategoryController::class, 'index']);
    Route::post('/', [BookCategoryController::class, 'create']);
    Route::put('/{id}', [BookCategoryController::class, 'update']);
    Route::delete('/{id}', [BookCategoryController::class, 'destroy']);
});

Route::prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('/', [BookController::class, 'create']);
    Route::put('/{id}', [BookController::class, 'update']);
    Route::delete('/{id}', [BookController::class, 'destroy']);
});

Route::prefix('book_loan')->group(function () {
    Route::get('/', [BookLoanController::class, 'index']);
    Route::post('/', [BookLoanController::class, 'borrow']);
    Route::put('/{id}', [BookLoanController::class, 'returnBook']);
});
