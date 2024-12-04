<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CheckInForm extends Model
{
    protected $fillable = [
        "checkin_date",
        "expectedCheckoutDate",
        "total_amount",
        "status",
        "status",
        "notes"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function check_out_form(): HasMany
    {
        return $this->hasMany(CheckOutForm::class);
    }


}
