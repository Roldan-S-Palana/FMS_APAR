<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStatus extends Model
{
    use HasFactory;

    protected $table = 'fee_status';

    protected $fillable =[
        'fee_status',
    ];
}