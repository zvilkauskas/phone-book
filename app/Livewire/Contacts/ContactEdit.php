<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\Contacts\ContactForm;
use App\Models\Country;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class ContactEdit extends Component
{
    public ContactForm $form;

    public function mount(Contact $Contact): void
    {
        $this->form->setContact($Contact);
    }

    public function updateContact(): RedirectResponse
    {
        $this->form->update();
        session()->flash('success', 'Contact updated successfully');

        return redirect()->to('/phone-book');
    }

    public function render()
    {
        return view('livewire.contacts.contact-edit', [
            'users' => User::where('id', '!=', auth()->id())->get(),
            'countries' => Country::select('id', 'country_code')->get(),
        ])->layout('layouts.app');
    }
}
