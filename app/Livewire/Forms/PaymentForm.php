<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PaymentForm extends Form
{
    public $id;
    public $payment_type;
    public $amount;
    public $payment_date;
    public $user_id;
    public $room_type_id;

    public function rules()
    {
        return [
            'payment_type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date|before_or_equal:today',
            'user_id' => 'required|exists:users,id',
            'room_type_id' => 'required|exists:room_types,id',
        ];
    }
}
