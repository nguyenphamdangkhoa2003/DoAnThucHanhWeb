<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Forms\RoomForm;
use App\Models\Room;
use App\Models\RoomType;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Route;

class UpdateRoom extends Component
{
    use Toast;
    public $id;
    public RoomForm $form;
    public $available_options = [
        ["name" => "Available", "id" => "1"],
        ["name" => "Unvaiable", "id" => "0"]
    ];
    #[Layout("components.layouts.admin")]
    public function render()
    {
        $room_types = RoomType::all();
        $this->id = Route::current()->parameter("id");
        $room = Room::findOrFail($this->id);
        $this->form->room_number = $room->room_number;
        $this->form->room_type_id = $room->room_type_id;
        return view('livewire.pages.admin.update-room', [
            "room_types" => $room_types
        ]);
    }
    public function save()
    {
        try {
            $room = Room::find($this->id);
            $room->room_number = $this->form->room_number;
            $room->room_type_id = $this->form->room_type_id;
            $room->save();
            $this->success("Update room success!");
        } catch (\Throwable $th) {
            $this->error("Update room fail!");
        }
    }
    public function back()
    {
        return $this->redirectIntended(route("list-room"));
    }
}
