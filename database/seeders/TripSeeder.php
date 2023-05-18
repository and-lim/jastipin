<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::create([
            'destination' => 'Japan',
            'origin' => 'Indonesia',
            'start_date' => '2023-05-20',
            'arrival_date' => '2023-05-28',
            'request' => true,
            'description' => 'deskripsi nih',
            'status' => 'ongoing',
            'user_id' => 1,
        ]);
    }
}
