<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Phone
            </th>
            <th scope="col" class="px-6 py-3">
                Is shared
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($ownedContacts as $ownedContact)
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $ownedContact->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $ownedContact->country?->country_code ? '+' . $ownedContact->country->country_code : '' }} {{ $ownedContact->phone }}
                </td>
                <td class="px-6 py-4">
                    @if($ownedContact->sharedWithUsers->count())
                        <span class="text-green-600 font-semibold">Shared</span>
                    @else
                        <span class="text-gray-400">Not shared</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('contact.edit', $ownedContact->id) }}"
                       class="font-medium text-blue-600 hover:underline"
                    >
                        Edit
                    </a>
                    <button wire:click="deleteContact({{ $ownedContact->id }})"
                            wire:confirm="Are you sure you want to delete this contact?"
                            class="font-medium text-red-600 hover:underline"
                    >
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="px-6 py-3">
        {{ $ownedContacts->links() }}
    </div>
</div>
