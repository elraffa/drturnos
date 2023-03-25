<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone_number',
        'street_address',
        'city',
        'state',
        'postal_code',
        'dni',
        'insurance_name',
        'insurance_number',
        'is_guest'
    ];

}
