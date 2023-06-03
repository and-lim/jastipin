<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'hold_balance',
        'balance_to_buyer'
    ];
}
