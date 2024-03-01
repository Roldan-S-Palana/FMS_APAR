<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceAdditionalCharges extends Model
{
    use HasFactory;
    //protected $table = 'fgms_g7_invoice_additional_charges';

    protected $fillable = [
        'invoice_id',
        'service_charge',
    ];
}
