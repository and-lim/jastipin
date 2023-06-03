<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'ship_time_limit',
        'shipping_receipt',
        'shipping_status'
    ];
}
