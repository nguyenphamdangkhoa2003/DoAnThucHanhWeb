<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BookingDetail extends Model
{
    protected $fillable = [
        "booking_id",
        "room_type_id",
        "quantity",
    ];

    public function booking(): BelongsTo
    {
        return $this->BelongsTo(Booking::class);
    }
    public function room_type(): HasOne
    {
        return $this->hasOne(RoomType::class);
    }
}
