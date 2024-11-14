<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferOrderItem extends Model
{
    use HasFactory;

    protected $table = 'transfer_order_items';

    protected $fillable = [
        'transfer_order_id',
        'product_id',
        'quantity'
    ];

    public function transferOrder()
    {
        return $this->belongsTo(TransferOrder::class, 'transfer_order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
