<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferOrder extends Model
{
    use HasFactory;

    protected $table = 'transfer_orders';

    protected $fillable = [
        'order_number',
        'source_branch',
        'destination_branch',
        'order_date',
        'description'
    ];

    public function branchFrom()
    {
        return $this->belongsTo(Branch::class, 'branch_from');
    }

    public function branchTo()
    {
        return $this->belongsTo(Branch::class, 'branch_to');
    }
}
