<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReturnBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth' ,
], function () {
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');

    
});
Route::group(['middleware' => 'api'], function($router) {
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    Route::post('profile', [AuthController::class, 'me'])->name('profile');
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'officer'
], function($router) {

    Route::apiResource('category', CategoryController::class, ['except' => 'destroy']);
    Route::delete('category', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::apiResource('publisher', PublisherController::class, ['except' => 'destroy']);
    Route::delete('publisher', [PublisherController::class, 'destroy'])->name('publisher.destroy');

    Route::apiResource('member', MemberController::class, ['except' => 'destroy']);
    Route::delete('member', [MemberController::class, 'destroy'])->name('member.destroy');

    Route::apiResource('book', BookController::class, ['except' => 'destroy']);
    Route::delete('book', [BookController::class, 'destroy'])->name('book.destroy');

    Route::apiResource('loan', LoanController::class, ['except' => 'destroy']);
    Route::delete('loan', [LoanController::class, 'destroy'])->name('loan.destroy');

    Route::apiResource('return', ReturnBookController::class, ['except' => 'destroy']);
    Route::delete('return', [ReturnBookController::class, 'destroy'])->name('return.destroy');
});
