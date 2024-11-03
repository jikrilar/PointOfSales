<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    // Define the table name (if different from default 'vendors')
    protected $table = 'vendors';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
        'bank',
        'account_number',
        'account_name',
        'tax_number',
        'vat'
    ];
}
