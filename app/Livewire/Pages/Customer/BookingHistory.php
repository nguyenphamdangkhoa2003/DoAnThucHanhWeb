<?php

namespace App\Livewire\Pages\Customer;

use App\Models\Booking;
use Auth;
use Livewire\Component;

class BookingHistory extends Component
{

    public function render()
    {
        $booking_history = Booking::where('user_id', Auth::user()->id);
        return view('livewire.pages.customer.booking-history', compact('booking_history'));
    }
}
