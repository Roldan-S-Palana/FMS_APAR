<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayableInvoice extends Model
{
    use HasFactory;
       protected $table = 'payable_invoice';

    protected $fillable = [
        'vendor_id',
        'po_id',
        'date_created',
        'date_due',
    ];
}
