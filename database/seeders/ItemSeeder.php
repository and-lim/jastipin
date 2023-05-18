<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $items = array(
            array(

                'item_name' => 'item 1',
                    'item_category' => 'Fashion',
                    'item_image' => '1684333267_SearchBase',
                    'item_weight' => '1',
                    'item_stock' => '3',
                    'item_price' => '1000000',
                    'item_display_price' => '2000000',
                    'item_description' => 'deskripsi item 1',
                    'trip_id' => 1,
            ),
            array(

                'item_name' => 'item 2',
                    'item_category' => 'Fashion',
                    'item_image' => '1684333267_Delete User',
                    'item_weight' => '2',
                    'item_stock' => '4',
                    'item_price' => '2000000',
                    'item_display_price' => '3000000',
                    'item_description' => 'deskripsi item 2',
                    'trip_id' => 1,
            )
            );
        DB::table('items')->insert($items);
    }
}
