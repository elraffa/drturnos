<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model

{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone_number',
        'specialty'
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }

    public function setAvailability($availability)
    {
        $this->availability = $availability;
        $this->save();
    }
}