<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class vendors extends Model
{
    use HasFactory;

    //protected $table = 'fgms_g7_vendors';
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

        'signature',
        'bir_2302', 
        'sec_dti_reg',
        'business_perm',
        'accred_docu',
        'other_docu',
    ];
    public function setContractStartAttribute($value)
    {
        $this->attributes['contract_start'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setContractDueAttribute($value)
    {
        $this->attributes['contract_due'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    
}
