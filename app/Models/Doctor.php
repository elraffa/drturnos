<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }
}