<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'active_ingredient',
        'presentation',
        'concentration',
        'laboratory',
        'batch',
        'expiration_date',
        'stock',
        'min_stock',
        'price',
        'status',
    ];

    protected $casts = [
        'expiration_date' => 'date',
        'price' => 'decimal:2',
    ];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function medicationMovements()
    {
        return $this->hasMany(MedicationMovement::class);
    }
}
