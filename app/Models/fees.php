<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class fees extends Model
{
    use HasFactory;
    //protected $table = 'fgms_g7_fees';
 protected $table = 'ap_fees';
    protected $fillable = [
        'invoice_id',
        'vendor_id',
        'first_name',
        'last_name',
        'gender',
        'fee_type',
        'amount',
        'update_date',
        'status',
    ];
    public function setPaidDateAttribute($value)
    {
        $this->attributes['update_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    
}
