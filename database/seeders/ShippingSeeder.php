<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shippings = array(
            array(
                'shipping_name' => 'regular',
                'shipping_price' => '200000'
            ),
            array(
                'shipping_name' => 'instant',
                'shipping_price' => '300000'
            )
        );
        DB::table('shipping_types')->insert($shippings);
    }
}
