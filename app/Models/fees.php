<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class fees extends Model
{
    use HasFactory;
    //protected $table = 'fgms_g7_fees';
 protected $table = 'fees';
    protected $fillable = [
        'invoice_id',
        'first_name',
        'last_name',
        'gender',
        'fee_type',
        'amount',
        'paid_date',
        'status',
    ];

}
