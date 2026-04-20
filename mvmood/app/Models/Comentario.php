<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comentario extends Model
{
    protected $fillable = ['uuid','publicacion_id','user_id','contenido'];

    public static function boot(){
        parent::boot();
        static::creating(fn($model) => $model->uuid = (string) Str::uuid());
    }
    
    public function emisor(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publicacion(){
        return $this->belongsTo(Publicacion::class);
    }
}
