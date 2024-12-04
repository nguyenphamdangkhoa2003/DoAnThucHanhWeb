<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckOutDetail extends Model
{
    protected $fillable = [
        "id",
        "cleaning_fee",
        "addition_notes"
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function check_out_form(): BelongsTo
    {
        return $this->belongsTo(CheckOutForm::class);
    }
}
