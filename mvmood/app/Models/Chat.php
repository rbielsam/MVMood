<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use  Illuminate\Support\Str;

class Chat extends Model
{
    protected static function boot() {
        parent::boot();
        static::creating(fn($model) => $model->uuid = (string) \Illuminate\Support\Str::uuid());
    }

    public function usuarios(): BelongsToMany {
        return $this->belongsToMany(User::class,'chat_user');
    }

    public function mensajes(): HasMany {
        return $this->hasMany(Mensaje::class);
    }
}
