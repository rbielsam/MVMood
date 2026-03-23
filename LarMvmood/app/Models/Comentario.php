<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentario';
    protected $primaryKey = 'idUnique';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'idUnique',
        'idUsuario',
        'idPublicacion',
        'contenido'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario', 'idUnique');
    }
}
