<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Booking;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout("components.layouts.admin")]
class ListBooking extends Component
{
    use Toast;
    public $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'check_int', 'label' => 'Check in'],
        ['key' => 'check_out', 'label' => 'Check out'],
        ["key" => "total_price", "label" => "Total price"],
    ];
    public array $sortBy = ['column' => 'id', 'direction' => 'asc'];
    public string $search = "";
    public function render()
    {
        $bookings = Booking::query()
            ->when($this->search, function (Builder $q) {
                $q->where(function ($query) {
                    $query->where('room_type_name', 'like', "%$this->search%");
                });
            })
            ->orderBy(...array_values($this->sortBy))
            ->paginate(5);
        return view('livewire.pages.admin.list-booking', [
            "bookings" => $bookings
        ]);
    }
}
