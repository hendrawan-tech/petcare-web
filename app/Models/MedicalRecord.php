<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'medical_records';

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }

    public function controlSchedules()
    {
        return $this->hasMany(ControlSchedule::class);
    }

    public function medicalPrescriptions()
    {
        return $this->hasMany(MedicalPrescription::class);
    }

    public function inpatients()
    {
        return $this->hasOne(Inpatient::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
