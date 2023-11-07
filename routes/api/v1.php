<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

Route::namespace('App\Http\Controllers\Api\V1')
    ->prefix('v1')
    ->group(function () {
        // Route::post('/login', 'AuthController@login');
        // Route::post('/register', 'AuthController@createUser');

        Route::get('users',[UserController::class,'index'])->name('user.index');
        Route::post('users',[UserController::class,'createUser'])->name('user.create');
        Route::get('users/{id}',[UserController::class,'getUser'])->name('user.get');
        Route::post('users/{id}',[UserController::class,'updateUser'])->name('user.update');
        Route::delete('users/{id}',[UserController::class,'deleteUser'])->name('user.delete');

        Route::middleware(['auth:sanctum'])->group(function () {
        });
    });

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'
    ], 404);
});
