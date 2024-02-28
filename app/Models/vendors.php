<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendors extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'company_name',
        'gender',
        'contact_no',
        'address',
        'city',
        'zip_code',
        'region',
        'contract_start',
        'contract_due',
        'payment_method',
        'payment_term',
        
    ];
    
}
