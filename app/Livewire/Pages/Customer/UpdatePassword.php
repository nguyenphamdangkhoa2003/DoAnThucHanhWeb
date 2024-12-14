<?php

namespace App\Livewire\Pages\Customer;

use Auth;
use Dotenv\Exception\ValidationException;
use Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
#[Layout("layouts.app")]
class UpdatePassword extends Component
{
    public string $password = '';
    public string $password_confirmation = '';
    public function render()
    {
        return view('livewire.pages.customer.update-password');
    }

    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset( 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}
