<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(

                'fullname' => 'user 1',
                'email' => 'user1@gmail.com',
                'phone_number' => '08121212121',
                'city' => 'Kota Bogor',
                'is_admin' => false,
                'balance' => 100000000,
                'npwp' => 123123123,
                'password' => Hash::make('123456')
            ),
            array(

                'fullname' => 'user 2',
                'email' => 'user2@gmail.com',
                'phone_number' => '08121212121',
                'is_admin' => false,
                'city' => 'Kota Banda Aceh',
                'balance' => 100000000,
                'npwp' => 123123123,
                'password' => Hash::make('123456')
            ),
            array(

                'fullname' => 'user 3',
                'email' => 'user3@gmail.com',
                'phone_number' => '08121212121',
                'is_admin' => false,
                'city' => 'Kabupaten Banjarnegara',
                'balance' => 100000000,
                'npwp' => 123123123,
                'password' => Hash::make('123456')
            ),
            array(

                'fullname' => 'admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '08121212121',
                'is_admin' => true,
                'city' => 'Kota Jakarta Selatan',
                'balance' => 0,
                'npwp' => 123123123,
                'password' => Hash::make('123456')
            )
        );
        DB::table('users')->insert($users);
    }
}
