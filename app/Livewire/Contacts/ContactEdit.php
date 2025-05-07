<?php

declare(strict_types=1);

namespace App\Livewire\Contacts;

use App\Livewire\Forms\Contacts\ContactForm;
use App\Models\Country;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class ContactEdit extends Component
{
    public ContactForm $form;

    public function mount(Contact $contact): void
    {
        $this->form->setContact($contact);
    }

    public function updateContact(): RedirectResponse|Redirector
    {
        $this->form->update();
        session()->flash('success', 'Contact updated successfully');

        return redirect()->to('/contacts');
    }

    public function render(): View
    {
        return view('livewire.contacts.contact-edit', [
            'users' => User::where('id', '!=', auth()->id())->get(),
            'countries' => Country::select('id', 'country_code')->get(),
        ])->layout('layouts.app');
    }
}
