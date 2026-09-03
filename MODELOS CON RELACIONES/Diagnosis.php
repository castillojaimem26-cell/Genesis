<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'code',
        'description',
        'type',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
