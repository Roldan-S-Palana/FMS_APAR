<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;

    //protected $table = 'fgms_g7_clients';

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'email',
        'phone_number',
        'zip_code',
        'city',
        'region',
        'upload',
        'signature',
    ];
    public function setDateOfBirthAttribute($value)
{
    $this->attributes['date_of_birth'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
}

    
}
