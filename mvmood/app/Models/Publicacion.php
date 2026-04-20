<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'contenido'])]

class Publicacion extends Model
{
    protected $table = 'publicacion';

    public function comentarios() {
        return $this->hasMany(Comentario::class)->orderBy('created_at','desc');
    }
}
