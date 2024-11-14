<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'address',
        'phone_number',
        'email',
        'company_id',
        'tax_number',
        'vat'
    ];

    // Define relationship
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function cashier()
    {
        return $this->belongsTo(Company::class);
    }
}
