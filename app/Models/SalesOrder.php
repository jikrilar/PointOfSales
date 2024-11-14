<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesOrder extends Model
{
    use HasFactory;

    // Define the table name (if different from default 'sales_orders')
    protected $table = 'sales_orders';

    protected $fillable = [
        'counter',
        'branch_name',
        'receipt_date',
        'receipt_id',
        'receipt_time',
        'member_no',
        'customer_sex',
        'customer_age',
        'sales_type',
        'cashier_name',
        'salesassociate_name',
        'stock_code', // kode dari inventory barang terkait
        'barcode',
        'sno', // nomor urut item pada receipt
        'discount_code',
        'color',
        'size',
        'fldesc', // nama dari item yang terjual,
        'qty',
        'gross_amount', // harga normal
        'discount_amount', // jumlah potongan diskon
        'net_amount', // harga akhir setelah dikurangi diskon,
        'branch_type',
        'member_status',
        'product_department',
        'product_brand',
        'product_group',
        'sub_group_desc',
        'class',
        'category',
        'desc_btq',
        'inventory_id',
        'member_id',
        'cashier_id',
    ];

    /**
     * Get the user that owns the SalesOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
