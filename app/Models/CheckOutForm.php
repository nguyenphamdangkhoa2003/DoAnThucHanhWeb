<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CheckOutForm extends Model
{
    protected $fillable = [
        "checkout_date",
        "total_pay",
        "additionChange",
        "payment_status",
        "notes"
    ];

    public function check_in_form(): BelongsTo
    {
        return $this->belongsTo(CheckInForm::class);
    }

    public function check_out_detail(): HasMany
    {
        return $this->hasMany(CheckOutDetail::class);
    }
}
