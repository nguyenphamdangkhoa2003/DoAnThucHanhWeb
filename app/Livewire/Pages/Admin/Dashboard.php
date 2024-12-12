<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Room;
use Arr;
use Date;
use Livewire\Attributes\Layout;
use Livewire\Component;
class Dashboard extends Component
{
    public array $rooms_chart = [];
    public array $select_revenue = [];
    public $selected_revenue;
    public function mount()
    {
        $rooms = Room::all();
        $count_room_availabel = $rooms->filter(fn($room) => $room->is_available(Date::today(), Date::today()))->count();
        $count_room = $rooms->count();
        $this->rooms_chart = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Booked', 'Avalable'],
                'datasets' => [
                    [
                        'label' => '# of Rooms',
                        'data' => [$count_room - $count_room_availabel, $count_room_availabel],
                    ]
                ]
            ]
        ];

        $this->select_revenue = [
            ["id" => 1, "name" => "Day"],
            ["id" => 2, "name" => "Month"],
            ["id" => 3, "name" => "Year"]
        ];
        $this->selected_revenue = 1;
    }

    public function switch()
    {
        $type = $this->rooms_chart['type'] == 'bar' ? 'pie' : 'bar';
        Arr::set($this->rooms_chart, 'type', $type);
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.dashboard');
    }
}
