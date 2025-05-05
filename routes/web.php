<?php

use App\Livewire\Contacts\ContactCreate;
use App\Livewire\Contacts\ContactEdit;
use App\Livewire\Contacts\ContactIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/contacts', ContactIndex::class)->name('contact.index');
    Route::get('/contacts/create', ContactCreate::class)->name('contact.create');
    Route::get('contacts/{contact}/edit', ContactEdit::class)->name('contact.edit');
});

require __DIR__.'/auth.php';
