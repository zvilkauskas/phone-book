<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteContact($id): void
    {
        $Contact = Contact::findOrFail($id);
        $Contact->delete();
        session()->flash('success', 'Contact deleted successfully');
    }

    public function cleanSession(): void
    {
        session()->forget('success');
    }

    public function render()
    {
        $ownedContacts = Contact::where('user_id', auth()->id())
            ->search(['name', 'phone'], $this->search)
            ->latest()
            ->paginate(10);

        return view('livewire.contacts.contact-index', [
            'ownedContacts' => $ownedContacts,
            'sharedContacts' => auth()->user()->sharedContacts()->latest()->get(),
        ])
            ->layout('layouts.app');
    }
}
