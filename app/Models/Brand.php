<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // Tentukan field yang dapat diisi (mass assignable)
    protected $fillable = [
        'name',
        'description',
        'logo',
        'website_url'
    ];
}
