<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOredrLine extends Model
{
    use HasFactory;
    protected $table = 'ap_purchase_order';

    protected $fillable = [
        'po_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
    ];
}
