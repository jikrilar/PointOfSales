<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    // Define the table name (if different from default 'sales_orders')
    protected $table = 'sales_orders';

    protected $fillable = [
        'customer_id',
        'order_date',
        'status',
        'total_amount',
        'shipping_address',
        'billing_address',
        'payment_method',
    ];

    // Define relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
