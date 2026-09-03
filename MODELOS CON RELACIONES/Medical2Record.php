<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'record_number',
        'personal_history',
        'family_history',
        'allergies',
        'current_medications',
        'surgical_history',
        'observations',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
