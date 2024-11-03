<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name (if different from default 'products')
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'department_id',
        'class_id',
        'subclass_id',
        'brand_id'
    ];

    // Define relationships
    public function department()
    {
        return $this->belongsTo(ProductDepartment::class);
    }

    public function class()
    {
        return $this->belongsTo(ProductClass::class);
    }

    public function subclass()
    {
        return $this->belongsTo(ProductSubclass::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
