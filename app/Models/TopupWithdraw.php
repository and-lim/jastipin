<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupWithdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_code',
        'account_number',
        'amount',
        'unique_code',
        'transfer_receipt',
        'activity',
        'approval_status',
        'decline_reason'
    ];
}