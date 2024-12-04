<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckInDetail extends Model
{
    protected $fillable = [
        "price_per_night",
        "number_of_night",
        "sub_total",
    ];

    public function check_in_form(): BelongsTo
    {
        return $this->belongsTo(CheckInForm::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
