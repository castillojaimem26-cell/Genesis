<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'medication_id',
        'dosage',
        'frequency',
        'duration',
        'instructions',
        'status',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }
}
