<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsMessageController;
use App\Http\Controllers\Auth\AuthRegisteredUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/contact-us', [ContactUsMessageController::class, 'store'])->name('contact.store');
Route::post('/register-expert', [AuthRegisteredUserController::class, 'store'])->name('expert.store');


