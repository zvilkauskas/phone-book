<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="py-12">
        <form wire:submit="saveContact" class="max-w-md mx-auto flex flex-col gap-6 shadow-2xl rounded-2xl p-4">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="form.name"
                              id="name"
                              class="block mt-1 w-full"
                              type="text"
                              name="name"
                              required
                              autofocus
                              autocomplete="name"
                              placeholder="Enter the name"
                />
                <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <div class="flex items-center gap-2">

                    <!-- Country Code Select -->
                    <select class="border-black focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/4"
                            wire:model="form.country_id"
                    >
                        <option value="" selected disabled hidden>Code</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_code }}</option>
                        @endforeach
                    </select>

                    <!-- Phone Input -->
                    <x-text-input wire:model="form.phone"
                                  id="phone"
                                  class="block w-full"
                                  type="text"
                                  name="phone"
                                  required
                                  autocomplete="phone"
                                  placeholder="Digits only e.g. 0123456789"
                    />
                </div>
            </div>

            <!-- Save button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="w-full text-center justify-center">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
