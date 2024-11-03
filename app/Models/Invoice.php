<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // Define the table name (if different from default 'invoices')
    protected $table = 'invoices';

    protected $fillable = [
        'sales_order_id',
        'invoice_number',
        'customer_id',
        'total_amount',
        'status',
        'issue_date',
        'due_date',
        'payment_date',
        'notes',
    ];

    // Define relationship with SalesOrder
    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class);
    }

    // Define relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
