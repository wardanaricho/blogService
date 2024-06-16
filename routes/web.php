<?php

use App\Http\Controllers\User\UserController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);
Route::get('/user-view', [UserController::class, 'userView']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/edit/{userId}', [UserController::class, 'edit']);
Route::put('/user/update/{userId}', [UserController::class, 'update']);
Route::delete('/user/delete/{userId}', [UserController::class, 'delete']);
