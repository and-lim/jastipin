<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_category',
        'item_image',
        'item_weight',
        'item_stock',
        'item_price',
        'item_display_price',
        'item_description',
        "trip_id"
    ];
}
