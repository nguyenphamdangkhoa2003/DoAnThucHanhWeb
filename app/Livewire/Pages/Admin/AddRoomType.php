<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\Image;
use App\Models\RoomType;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class AddRoomType extends Component
{
    use Toast;
    use WithFileUploads;
    #[Rule(['photos' => 'required'])]          // A separated rule to make it required
    #[Rule(['photos.*' => 'image|max:1024'])]   // Notice `*` syntax for validate each file
    public array $photos = [];
    public RoomTypeForm $form;
    #[Layout("components.layouts.admin")]
    public function render()
    {
        return view('livewire.pages.admin.add-room-type');
    }
    public function save()
    {
        try {
            $this->form->validate();
            $room_type = RoomType::create(
                $this->form->pull(),
            );
            foreach ($this->photos as $photo) {
                $cloundinary = cloudinary()->upload($photo->getRealPath());
                Image::create([
                    "url" => $cloundinary->getSecurePath(),
                    "public_image_id" => $cloundinary->getPublicId(),
                    "room_type_id" => $room_type->id,
                ]);
            }
            $this->success("Create type room success!");
            return $this->redirectIntended("list-type-room");
        } catch (\Throwable $th) {
            $this->error("Create type room fail!");
        }
    }

    public function back()
    {
        return $this->redirectIntended("list-type-room");
    }
}
