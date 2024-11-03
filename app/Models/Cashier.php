<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    use HasFactory;

    protected $table = 'cashiers';


    // Define the fillable attributes
    protected $fillable = [
        'name',           // Nama kasir
        'phone_number',   // Nomor telepon kasir
        'branch_id',      // Foreign key ke tabel branch
        'user_id',
    ];

    // Relasi dengan tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan tabel branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
