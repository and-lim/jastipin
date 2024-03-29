<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'origin',
        'start_date',
        'arrival_date',
        'luggage',
        'request',
        'status',
        'tax',
        'description',
        'user_id'
    ];
}