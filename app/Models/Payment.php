<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'bank',
        'card_id',
        'expiry_date',
        'payment_date',
        'transaction_number',
        'note',
        'invoice_id',
    ];

}
