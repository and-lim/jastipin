<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    use HasFactory;

    protected $fillable = [
       'requester_id',
       'request_name', 
       'request_category', 
       'request_brand', 
       'request_description', 
       'request_image', 
       'request_price', 
       'request_price_ppn', 
       'request_price_pabean', 
       'request_quantity', 
       'request_weight', 
       'request_status', 
       'trip_id'
    ];
}