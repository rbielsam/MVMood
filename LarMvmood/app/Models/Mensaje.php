<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mensaje extends Model
{
    public function chat(): BelongsTo {

    }

    public function emisor(): BelongsTo {
        
    }
}
