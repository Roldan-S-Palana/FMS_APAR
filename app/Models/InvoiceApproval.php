<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceApproval extends Model
{
    use HasFactory;
    //protected $table = 'fgms_g7_pending_invoice_approvals';
    protected $fillable = [
        'approval_id',
        'invoice_id',
        'company_name',
        'gender',
        'fee_types',
        'amount',
        'approver_id',
        'status',
        'remarks',

    ];

}
