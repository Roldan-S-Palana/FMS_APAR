<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'ap_purchase_order';
    protected $fillable = [
        'vendor_id',
        'staff_id',
        'date_order',
        'total_amount',
        'ship_date',
        'ship_address',
    ];
    public function setDateOrderAttribute($value)
    {
        $this->attributes['date_order'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setShipDateAttribute($value)
    {
        $this->attributes['ship_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
}
