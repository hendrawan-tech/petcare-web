<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalPrescription extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    protected $table = 'medical_prescriptions';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function medicalRecord()
    {
        return $this->belongsTo(Inpatient::class);
    }
}
