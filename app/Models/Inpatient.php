<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inpatient extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
