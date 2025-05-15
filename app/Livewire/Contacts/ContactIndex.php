<?php

declare(strict_types=1);

namespace App\Livewire\Contacts;

use App\Models\Contact;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $searchOwnedContacts = '';
    public $searchSharedContacts = '';

    public function deleteContact($id): void
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        session()->flash('success', 'Contact deleted successfully');
    }

    public function cleanSession(): void
    {
        session()->forget('success');
    }

    public function render(): View
    {
        $ownedContacts = Contact::where('user_id', auth()->id())
            ->search(['name', 'phone'], $this->searchOwnedContacts)
            ->latest()
            ->paginate(10, ['*'], 'owned-contacts-table');

        $sharedContacts = auth()->user()->sharedContacts()
            ->search(['name', 'phone'], $this->searchSharedContacts)
            ->latest()
            ->paginate(5, ['*'], 'shared-contacts-table');

        return view('livewire.contacts.contact-index', [
            'ownedContacts' => $ownedContacts,
            'sharedContacts' => $sharedContacts,
        ])
            ->layout('layouts.app');
    }
}
