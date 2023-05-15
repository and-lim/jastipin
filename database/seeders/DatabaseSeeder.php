<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        $this->call(CountriesTableSeeder::class);
        User::create([
            'fullname' => 'user 1',
            'email' => 'user1@gmail.com',
            'phone_number' => '08121212121',
            'is_admin' => false,
            'password' => Hash::make('123456')
        ]);
    }
}
