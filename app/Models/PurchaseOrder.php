<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'staff_id',
        'date_order',
        'total_amount',
        'ship_date',
        'ship_address',
    ];
}
