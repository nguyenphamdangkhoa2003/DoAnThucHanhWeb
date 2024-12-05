<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
#[Layout("components.layouts.admin")]
class Banners extends Component
{
    #[Rule(['photos' => 'required'])]          // A separated rule to make it required
    #[Rule(['photos.*' => 'image|max:100'])]   // Notice `*` syntax for validate each file
    public array $photos = [];
    public function render()
    {
        return view('livewire.pages.admin.banners');
    }
}
