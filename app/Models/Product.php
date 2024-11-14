<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'fldesc', // nama produk
        'shdesc',
        'sescd',
        'picture',
        'launch_date',
        'barcode',
        'department_code',
        'group_code',
        'class_code',
        'sub_group_code',
        'brand_name',
        'gross_price',
        'discount_price',
        'member_price',
        'cost',
        'price_id',
        'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
