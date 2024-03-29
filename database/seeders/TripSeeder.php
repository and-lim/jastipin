<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = array(
            array(
                'destination' => 'Japan',
                'origin' => 'Kota Bogor',
                'start_date' => '2023-07-30',
                'arrival_date' => '2023-08-05',
                'request' => true,
                'total_price' => 11000000,
                'tax' => 1158500,
                'description' => 'deskripsi nih',
                'status' => 'ongoing',
                'user_id' => 1,
            ),
            array(
                'destination' => 'United States',
                'origin' => 'Kabupaten Banjarnegara',
                'start_date' => '2023-08-15',
                'arrival_date' => '2023-08-18',
                'request' => true,
                'description' => 'deskripsi nih',
                'status' => 'ongoing',
                'tax' => 21018500,
                'total_price' => 71000000,
                'user_id' => 3,
            ),
            array(
                'destination' => 'Japan',
                'origin' => 'Kota Bogor',
                'start_date' => '2023-08-05',
                'arrival_date' => '2023-08-10',
                'request' => true,
                'tax' => 20025500,
                'total_price' => 68000000,
                'description' => 'deskripsi nih',
                'status' => 'ongoing',
                'user_id' => 1,
            ),
            array(
                'destination' => 'Brazil',
                'origin' => 'Kota Dumai',
                'start_date' => '2023-07-01',
                'arrival_date' => '2023-07-03',
                'request' => true,
                'tax' => 20025500,
                'total_price' => 68000000,
                'description' => 'deskripsi nih',
                'status' => 'ongoing',
                'user_id' => 3,
            )

        );

        DB::table('trips')->insert($trips);
    }
}
