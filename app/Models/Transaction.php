<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_id',
        'transaction_status',
        'shipping_type_id',
        'shipping_trip_price',
        'beacukai_pabean',
        'total_paid'
    ];
}
