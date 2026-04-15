<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function usuarios(): BelongsToMany {
        return $this;
    }

    public function mensajes(): HasMany {
        return $this;
    }
}
