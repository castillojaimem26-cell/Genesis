<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'user_id',
        'hospitalization_id',
        'name',
        'description',
        'performed_at',
        'observations',
    ];

    protected $casts = [
        'performed_at' => 'datetime',
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
