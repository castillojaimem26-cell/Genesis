<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'medication_id',
        'type',
        'quantity',
        'stock_before',
        'stock_after',
        'reason',
        'user_id',
        'reference_id',
        'reference_type',
    ];

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reference()
    {
        return $this->morphTo();
    }
}
