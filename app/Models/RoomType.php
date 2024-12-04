<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        "id",
        "room_type_name",
        "description",
        "base_price",
        "level",
        "children",
        "adults"
    ];
}
