<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Define the table name (if different from default 'inventories')
    protected $table = 'inventories';

    // Define the fillable attributes
    protected $fillable = [
        'fldesc', // nama item dari inventory terkait
        'shdesc',
        'sescd',
        'launch_date',
        'branch_code',
        'stock_code',
        'kp2cd',
        'kp3cd',
        'fdodt',
        'ldodt',
        'fsolddt',
        'quantity_on_hand',
        'discound_code',
        'p4',
        'import_date',
        'departmen_code',
        'group_code',
        'class_code',
        'subclass_code',
        'cost',
        'product_id',
        'branch_id'
    ];

    // Relasi dengan tabel produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi dengan tabel branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
