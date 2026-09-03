<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'document',
        'document_type',
        'status',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function appointmentsCreated()
    {
        return $this->hasMany(Appointment::class, 'created_by');
    }

    public function medicationMovements()
    {
        return $this->hasMany(MedicationMovement::class);
    }

    public function vitalSigns()
    {
        return $this->hasMany(VitalSign::class);
    }

    public function procedures()
    {
        return $this->hasMany(Procedure::class);
    }

    public function laboratoryResultsApproved()
    {
        return $this->hasMany(LaboratoryResult::class, 'approved_by');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }
}
