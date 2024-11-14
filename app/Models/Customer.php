<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone_number',
        'gender',
        'age_category',
        'race',
        'membership',
        'total_spending',
        'transaction_counter',
        'customer_birthday'
    ];
}
