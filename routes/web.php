<?php

use App\Http\Controllers\User\UserController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);
Route::get('/user-view', [UserController::class, 'userView']);
