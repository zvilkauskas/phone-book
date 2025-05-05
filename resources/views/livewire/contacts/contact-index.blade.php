<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="py-2">
        <!-- Search -->
        <x-text-input placeholder="Search for name or phone"
                      wire:model="search"
                      wire:input="$refresh"
                      type="text"
        />
        <!-- Add contact button -->
        <div class="flex items-center justify-between py-4">
            <h2>Contacts</h2>
            <a href="{{ route('phone-book.create') }}" wire:navigate>
                <x-primary-button class="w-full text-center justify-center">
                    {{ __('Add Contact') }}
                </x-primary-button>
            </a>
        </div>

        <!-- Contacts table -->
        @if($ownedContacts->count())
            @include('livewire.contacts.contact-index-contacts-table')
        @else
            <h2>Phone book is empty.</h2>
        @endif

        <!-- Shared contacts table -->
        @if($sharedContacts->count())
            @include('livewire.contacts.contact-index-shared-table')
        @else
            <h2>No shared contacts.</h2>
        @endif
    </div>

    <!-- Success messages -->
    @if(session()->has('success'))
        <div x-data=""
             x-init="setTimeout(() => {$wire.cleanSession()}, 2000)"
             id="toast-bottom-right"
             class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-sm right-5 bottom-5"
             role="alert"
        >
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}.</div>
            <button  wire:click="cleanSession" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
</div>
