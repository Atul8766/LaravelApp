<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WhatsappController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/getUser", [UserController::class, 'getUsers']);
Route::get('/whatsapp_page', [WhatsAppController::class, 'index']);
Route::post('whatsapp', [WhatsAppController::class, 'store']);


