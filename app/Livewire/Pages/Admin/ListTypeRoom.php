<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Image;
use App\Models\RoomType;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\DB;

class ListTypeRoom extends Component
{
    use Toast;
    use WithPagination;
    public array $sortBy = ['column' => 'room_type_name', 'direction' => 'asc'];
    public string $search = "";
    public $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'room_type_name', 'label' => 'Type room'],
        ['key' => 'description', 'label' => 'Description'],
        ["key" => "action", "label" => "Action"]
    ];
    #[Layout("components.layouts.admin")]
    public function render()
    {
        return view(
            'livewire.pages.admin.list-type-room',
            [
                "room_types" => RoomType::query()
                    ->when($this->search, function (Builder $q) {
                        $q->where(function ($query) {
                            $query->where('room_type_name', 'like', "%$this->search%")->orWhere("id", "like", "%$this->search%")->orWhere("description", "like", "%$this->search%");
                        });
                    })
                    ->orderBy(...array_values($this->sortBy))
                    ->paginate(5)
            ]
        );
    }

    public function redirectAddTypeRoom()
    {
        $this->redirectRoute("add-room-type");
    }
    public function redirectUpdateTypeRoom($id)
    {
        $this->redirectRoute("update-room-type", ["id" => $id]);
    }
    public function delete($id)
    {
        $room_type = RoomType::find($id);
        if (!$room_type->rooms->count())
            DB::transaction(
                function () use ($id, $room_type) {
                    $images = $room_type->images;
                    foreach ($images as $key => $value) {
                        Cloudinary::destroy($value->public_image_id);
                        Image::destroy($value->id);
                    }

                    RoomType::destroy($id);

                    $this->success("Delete type room success");
                }
            );
        else {
            $this->error("This Room Type cannot be deleted as it is linked to existing rooms.");
        }
    }
}