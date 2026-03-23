<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaccion extends Model
{
    protected $table = 'reaccion';
    protected $primaryKey = 'idUnique';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'idUnique',
        'idUsuario',
        'idPublicaion',
        'reaccion'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario', 'idUnique');
    }
}
