<?php

declare(strict_types=1);

namespace App\Livewire\Forms\Contacts;

use App\Models\Contact;
use Livewire\Form;

class ContactForm extends Form
{
    public ?Contact $contact;

    public $name = '';

    public $phone = '';

    public $country_id = '';

    public array $sharedWithUsers = [];

    public function setContact(Contact $contact): void
    {
        $this->contact = $contact;
        $this->name = $contact->name;
        $this->phone = $contact->phone;
        $this->country_id = $contact->country_id ?? '';
        $this->sharedWithUsers = $contact->sharedWithUsers()->pluck('users.id')->toArray();
    }

    public function store(): void
    {
        $data = $this->validate([
            'name' => 'required',
            'phone' => ['required', 'regex:/^\d{3,17}$/'],
            'country_id' => 'nullable',
        ]);

        auth()->user()->contacts()->create($data);
        $this->reset();
    }

    public function update(): void
    {
        $data = $this->validate([
            'name' => 'required',
            'phone' => ['required', 'regex:/^\d{3,17}$/'],
            'sharedWithUsers.*' => 'exists:users,id',
            'country_id' => 'nullable',
        ]);

        $this->contact->update($data);
        $this->contact->sharedWithUsers()->sync($this->sharedWithUsers);
        $this->reset();
    }
}
