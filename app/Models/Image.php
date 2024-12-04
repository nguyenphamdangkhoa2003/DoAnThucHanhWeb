<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $fillable = [
        "url",
        "imageable_id",
        "imageable_type"
    ];

    public function banner(): BelongsTo
    {
        return $this->belongsTo(Banner::class);
    }

    public function room_type(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
