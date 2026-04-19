<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/chats', [ChatController::class, 'misChats']);
    Route::get('/chats/{chatUuid}/mensajes', [ChatController::class, 'mostrarMensajes']);
    Route::post('/chats/enviar', [ChatController::class, 'enviar']);
});