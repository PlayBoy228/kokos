<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/user'], function () {
    Route::post('/make', [UserController::class, 'make']);
    Route::post('/update', [UserController::class, 'update']);
    Route::post('/delete', [UserController::class, 'delete']);
    Route::get('/all', [UserController::class, 'getList']);
    Route::get('/{id}', [UserController::class, 'getById']);
});

Route::group(['prefix' => '/friend'], function () {
    Route::post('/make', [FriendController::class, 'make']);
    Route::post('/delete/{id}', [FriendController::class, 'delete']);
    Route::get('/all', [FriendController::class, 'getList']);
    Route::get('/user/{id}', [FriendController::class, 'getByUserId']);
    Route::get('/list/{userId}', [FriendController::class, 'getFriendListByUserId']);
    Route::get('/list/friend-of-friend/{userId}', [FriendController::class, 'getFriendOfFriends']);
    Route::get('/{id}', [FriendController::class, 'getById']);
});

