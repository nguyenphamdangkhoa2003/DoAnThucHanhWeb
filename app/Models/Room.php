<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $fillable = [
        "is_avaliable"
    ];

    public function room_types(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
