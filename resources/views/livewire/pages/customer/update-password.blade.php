<div class="p-4 sm:p-8 bg-white text-black shadow sm:rounded-lg">
    <div class="max-w-xl m-auto">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <header>
                <h2 class="text-lg font-medium text-gray-900 ">
                    {{ __('Update Password') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 ">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
            </header>

            <form wire:submit="updatePassword" class="mt-6 space-y-6">
                <div>
                    <x-input-label for="update_password_password" :value="__('New Password')" />
                    <x-text-input wire:model="password" id="update_password_password" name="password" type="password"
                        class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input wire:model="password_confirmation" id="update_password_password_confirmation"
                        name="password_confirmation" type="password" class="mt-1 block w-full"
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <x-mary-button class="btn-primary" spinner="updatePassword"
                        type="submit">{{ __('Save') }}</x-mary-button>

                    <x-action-message class="me-3" on="password-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </form>
        </section>
    </div>
</div>
