<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable= [
        'event',
        'start_date',
        'end_date',
        'patient_id',
        'doctor_id'
    ];
    
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function scopeBetween($query, $start, $end)
    {
        return $query->where('start_date', '>=', $start)
            ->where('end_date', '<=', $end);
    }

    public static function isDoctorBookedBetween($start, $end, $doctorId)
    {
        return static::where('doctor_id', $doctorId)
            ->between($start, $end)
            ->exists();
    }
}
