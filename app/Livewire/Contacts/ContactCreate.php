<?php

declare(strict_types=1);

namespace App\Livewire\Contacts;

use App\Livewire\Forms\Contacts\ContactForm;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class ContactCreate extends Component
{
    public ContactForm $form;

    public function saveContact(): RedirectResponse|Redirector
    {
        $this->form->store();
        session()->flash('success', 'Contact created successfully');

        return redirect()->to('/contacts');
    }

    public function render(): View
    {
        return view('livewire.contacts.contact-create', [
            'countries' => Country::all(),
        ])->layout('layouts.app');
    }
}
