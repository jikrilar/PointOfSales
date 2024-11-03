<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'amount',
        'payment_date',
        'transaction_number',
        'notes',
        'payment_method_id',
    ];

    // Define relationship with Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    // Define relationship with Payment method
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
