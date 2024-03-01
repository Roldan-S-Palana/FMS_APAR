<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendors extends Model
{
    use HasFactory;

    //protected $table = 'fgms_g7_vendors';
    protected $fillable = [
        'full_name',
        'company_name',
        'gender',
        'contact_no',
        'contract_start',
        'contract_due',
        'payment_method',
        'payment_term',
        'address',
        'city',
        'zip_code',
        'region',
        'signature',
        'bir_2302',
        'business_perm',
        'sec_dti_reg',
        'accred_docu',
        'other_docu',
    ];
    
}
