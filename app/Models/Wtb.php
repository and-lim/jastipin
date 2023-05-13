<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wtb extends Model
{
    use HasFactory;

    protected $fillable = [
        'wtb_name',
        'wtb_location',
        'wtb_price',
        'wtb_image',
        'wtb_amount',
        'wtb_weight',
        'wtb_description',
        'wtb_status',
        'user_id'
    ];
}

