<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaboratoryResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'laboratory_test_id',
        'consultation_id',
        'requested_at',
        'sample_taken_at',
        'processed_at',
        'result_date',
        'result',
        'attachment_path',
        'approved_by',
        'status',
        'observations',
    ];

    protected $casts = [
        'requested_at' => 'datetime',
        'sample_taken_at' => 'datetime',
        'processed_at' => 'datetime',
        'result_date' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function laboratoryTest()
    {
        return $this->belongsTo(LaboratoryTest::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
