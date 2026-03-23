<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicacion';
    protected $primaryKey = 'idUnique';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'idUnique',
        'idUsuario',
        'contenido',
        'foto',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario', 'idUnique');
    }
}