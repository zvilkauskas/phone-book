<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\PhoneBook;
use App\Models\User;
use Illuminate\Database\Seeder;

class PhoneBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $countries = Country::pluck('id');


        foreach (range(1, 20) as $i) {
            $owner = $users->random();

            $phoneBook = PhoneBook::create([
                'user_id' => $owner->id,
                'country_id' => $countries->random(),
                'name' => 'Contact ' . $i,
                'phone' => rand(1000000, 9999999),
            ]);


            $sharedUsers = $users->where('id', '!=', $owner->id)->random(rand(1, 3))->pluck('id');
            $phoneBook->sharedWithUsers()->attach($sharedUsers);
        }
    }
}
