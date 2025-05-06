<?php

namespace Tests\Feature;

use App\Livewire\Contacts\ContactCreate;
use App\Models\Country;
use App\Models\User;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateContactTest extends TestCase
{
    use RefreshDatabase;


    public function test_user_can_create_contact(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->seed(CountrySeeder::class);
        $country = Country::first();

        Livewire::test(ContactCreate::class)
            ->set('form.name', 'John Doe')
            ->set('form.phone', '37012345678')
            ->set('form.country_id', $country->id)
            ->call('saveContact');

        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'phone' => '37012345678',
            'user_id' => $user->id,
            'country_id' => $country->id,
        ]);

    }
}
