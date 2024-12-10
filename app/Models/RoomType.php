<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    use HasFactory;
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

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function count_room_available()
    {
        $rooms = $this->rooms()->get(); // Hoặc sử dụng `->toArray()` để lấy mảng
        return $rooms->filter(function ($room) {
            return is_null($room->start_date) && is_null($room->end_date);
        })->count();
    }
}
