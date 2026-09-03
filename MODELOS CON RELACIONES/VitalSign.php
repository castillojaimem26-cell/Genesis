<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'user_id',
        'hospitalization_id',
        'temperature',
        'blood_pressure',
        'heart_rate',
        'respiratory_rate',
        'oxygen_saturation',
        'weight',
        'height',
        'glucose',
        'observations',
        'taken_at',
    ];

    protected $casts = [
        'temperature' => 'decimal:1',
        'weight' => 'decimal:2',
        'height' => 'decimal:2',
        'taken_at' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospitalization()
    {
        return $this->belongsTo(Hospitalization::class);
    }
}
