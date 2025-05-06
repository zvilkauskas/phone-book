<div class="py-12">
    <div class="flex items-center justify-between py-4">
        <h2>Shared contacts</h2>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-xl">
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
                    Who shared
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($sharedContacts as $sharedContact)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $sharedContact->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $sharedContact->country?->country_code ? '+' . $sharedContact->country->country_code : '' }} {{ $sharedContact->phone }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $sharedContact->user->name }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="px-6 py-3">
            {{ $sharedContacts->links() }}
        </div>
    </div>
</div>
