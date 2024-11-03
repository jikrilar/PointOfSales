<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // Define relationship
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
