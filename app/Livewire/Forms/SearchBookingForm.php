<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SearchBookingForm extends Form
{
    public $start_date;
    public $end_date;
    public $children;
    public $adults;

    public function rules()
    {
        return [
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'children' => 'nullable|integer|min:0',
            'adults' => 'required|integer|min:1',
        ];
    }

}
