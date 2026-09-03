<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document_type',
        'document_number',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'phone',
        'email',
        'address',
        'city',
        'civil_status',
        'emergency_contact_name',
        'emergency_contact_phone',
        'insurance_provider',
        'insurance_type',
        'status',
        'allergies',
        'current_medications',
        'personal_history',
        'family_history',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function hospitalizations()
    {
        return $this->hasMany(Hospitalization::class);
    }

    public function vitalSigns()
    {
        return $this->hasMany(VitalSign::class);
    }

    public function laboratoryTests()
    {
        return $this->hasMany(LaboratoryTest::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
