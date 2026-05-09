<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Events\EnviarMensaje;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            //'receptor_uuid' => 'required|exists:usuarios,uuid',
            'receptor_id' => 'required|integer',
            'contenido' => 'required|string',
        ]);

        $emisor = auth()->user();
        //$receptor = User::where('uuid', $request->receptor_uuid)->first();
        $receptor = User::find($request->receptor_id);

        // 1. Buscar o crear el chat 1 a 1
        $chat = Chat::whereHas('usuarios', fn($q) => $q->where('user_id', $emisor->id))
                    ->whereHas('usuarios', fn($q) => $q->where('user_id', $receptor->id))
                    ->where('es_grupal', false)
                    ->first();

        if (!$chat) {
            $chat = Chat::create(['uuid' => Str::uuid()]);
            $chat->usuarios()->attach([$emisor->id, $receptor->id]);
        }

        // 2. Crear el mensaje
        $mensaje = $chat->mensajes()->create([
            'uuid' => Str::uuid(),
            'emisor_id' => $emisor->id,
            'contenido' => $request->contenido,
        ]);

        // 3. Notificar a Pusher
        broadcast(new EnviarMensaje($mensaje))->toOthers();

        return response()->json($mensaje->load('emisor'), 201);
    }

    public function mostrarMensajes($chatUuid) {
        $chat = Chat::where('uuid',$chatUuid)->whereHas('usuarios',fn($q) => $q->where('user_id', auth()->id()))->firstOrFail();

        $mensajes = $chat->mensajes()->with('emisor')->orderBy('created_at', 'desc')->paginate(30);

        return response()->json($mensajes);
    }

    public function misChats() {
        $chats = auth()->user()->chats()->with(['usuarios','mensajes' => function($q) {
            $q->latest()->first();
        }])->get();

        return response()->json($chats);
    }
}
