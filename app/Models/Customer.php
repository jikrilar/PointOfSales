<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ktp_number',
        'ktp_photo',
        'photo',
        'email',
        'phone_number',
        'birthday'
    ];
}
