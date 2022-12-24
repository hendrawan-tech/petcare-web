<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function speciesPatient()
    {
        return $this->belongsTo(SpeciesPatient::class, 'species_patient_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
