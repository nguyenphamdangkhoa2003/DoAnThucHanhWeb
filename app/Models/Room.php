<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $fillable = [
        "is_avaliable",
        "room_number",
        "room_type_id"
    ];

    public function room_type(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
