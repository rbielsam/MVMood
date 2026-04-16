<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    public function usuarios(): BelongsToMany {
        return $this->belongsToMany(User::class,'chat_user');
    }

    public function mensajes(): HasMany {
        return $this->hasMany(Mensaje::class);
    }
}
