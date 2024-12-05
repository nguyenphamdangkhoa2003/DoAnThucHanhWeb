<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    protected $fillable = [
        "id",
        "room_type_name",
        "description",
        "base_price",
        "children",
        "adults"
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
