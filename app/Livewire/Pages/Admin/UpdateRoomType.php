<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\Image;
use App\Models\RoomType;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Route;

class UpdateRoomType extends Component
{
    use WithFileUploads;
    use Toast;
    public RoomTypeForm $form;
    #[Validate("required")]
    #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];
    public $id;
    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->id = Route::current()->parameter("id");
        $room_type = RoomType::findOrFail($this->id);
        $this->form->room_type_name = $room_type->room_type_name;
        $this->form->description = $room_type->description;
        $this->form->base_price = $room_type->base_price;
        $this->form->children = $room_type->children;
        $this->form->adults = $room_type->adults;
        return view('livewire.pages.admin.update-room-type');
    }

    public function back()
    {
        return $this->redirectIntended(route("list-type-room"));
    }

    public function save()
    {
        try {
            $this->form->validate();
            $room_type = RoomType::findOrFail($this->id);
            $room_type->update($this->form->pull());
            $images = $room_type->images;
            if (count($this->photos) > 0) {
                foreach ($images as $key => $value) {
                    Cloudinary::destroy($value->public_image_id);
                    Image::destroy($value->id);
                }
                foreach ($this->photos as $photo) {
                    $cloundinary = cloudinary()->upload($photo->getRealPath());
                    Image::create([
                        "url" => $cloundinary->getSecurePath(),
                        "public_image_id" => $cloundinary->getPublicId(),
                        "room_type_id" => $room_type->id,
                    ]);
                }
            }
            $this->success("Update type room success!");
            return $this->redirectIntended(route("list-type-room"));
        } catch (\Throwable $th) {
            $this->error("Update room type fail");
        }
    }
}
