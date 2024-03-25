<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDiscount extends Model
{
    use HasFactory;

    //protected $table = 'fgms_g7_invoice_discounts';
    protected $table = 'ar_invoice_discounts';

    
    protected $fillable = [
        'invoice_id',
        'offer_new',
    ];
    
}
