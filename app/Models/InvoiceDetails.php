<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    //protected $table = 'fgms_g7_invoice_details';
    protected $fillable = [
        'invoice_id',
        'items',
        'category',
        'quantity',
        'price',
        'amount',
        'amount_discount',
    ];
}
