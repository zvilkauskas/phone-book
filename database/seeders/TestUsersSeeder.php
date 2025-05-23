<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1,10) as $item) {
            User::create([
                'name' => "User $item",
                'email' => "user{$item}@user{$item}.lt",
                'password' => bcrypt('password'),
            ]);
        }
    }
}
