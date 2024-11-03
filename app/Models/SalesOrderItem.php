<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderItem extends Model
{
    use HasFactory;

    protected $table = 'sales_order_items';

    protected $fillable = [
        'sales_order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
    ];

    // Define relationship with SalesOrder
    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class);
    }

    // Define relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
