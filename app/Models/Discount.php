<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'discount_type',
        'value',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Get the products associated with the discount.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_discounts')
            ->withPivot('discount_value', 'discount_type');
    }
}
