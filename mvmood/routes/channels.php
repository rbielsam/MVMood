<?php
use App\Models\Chat;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//Broadcast::channel('chat.{chatUuid}', function ($user, $chatUuid) {
    // IMPORTANTE: $user es el usuario autenticado actualmente
//    return true;
//});

Broadcast::channel('chat.{chatUuid}', function ($user, $chatUuid) {
    // IMPORTANTE: $user es el usuario autenticado actualmente
    return Chat::where('id', $chatUuid)
               ->whereHas('usuarios', function($q) use ($user) {
                   $q->where('user_id', $user->id);
               })->exists();
});