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
        'product_id',     // Foreign key ke tabel product
        'branch_id',      // Foreign key ke tabel branch
        'stock',          // Jumlah stok produk di cabang
        'last_updated',   // Tanggal terakhir stok diperbarui
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
