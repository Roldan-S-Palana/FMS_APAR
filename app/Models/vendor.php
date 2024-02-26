<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'company_name',
        'gender',
        'contact_no',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'contract_start',
        'contract_due',
        'payment_method',
        'payment_term',
    ];
}
