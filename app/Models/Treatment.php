<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'price', 'medical_record_id'];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
