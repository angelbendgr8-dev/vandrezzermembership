<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'firstname' => 'Membership',
            'lastname' => 'Admin',
            'email' => 'admin@vandrezzermembership.com',
            'password' => Hash::make('password'),
            'type' => 1
        ]);
        $this->call([
           CountriesTableSeeder::class
        ]);
    }
}
