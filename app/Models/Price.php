<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'gross_price',
        'discount_percentage',
        'discount_amount',
        'discount_price',
        'membership',
        'membership_discount_percentance',
        'membership_discount_amount',
        'membership_price',
    ];
}
