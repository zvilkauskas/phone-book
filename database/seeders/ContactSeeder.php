<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $countries = Country::pluck('id');

        foreach ($users as $user) {
            $numberOfContacts = rand(11, 20);

            for ($i = 0; $i < $numberOfContacts; $i++) {
                $contact = Contact::create([
                    'user_id' => $user->id,
                    'country_id' => $countries->random(),
                    'name' => 'Contact ' . fake()->name(),
                    'phone' => rand(1000000, 9999999),
                ]);


                $sharedUsers = $users->where('id', '!=', $user->id)->random(rand(1, 3))->pluck('id');
                $contact->sharedWithUsers()->attach($sharedUsers);
            }
        }
    }
}
