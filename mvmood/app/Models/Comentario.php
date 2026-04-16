<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function emisor(){
        return $this->belongsTo(User::class, 'emisor_id');
    }

    public function publicacion(){
        return $this->belongsTo(Publicacion::class);
    }
}
