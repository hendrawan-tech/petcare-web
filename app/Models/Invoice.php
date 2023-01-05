<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function itemInvoices()
    {
        return $this->hasMany(ItemInvoice::class);
    }

    public function medicalPrescription()
    {
        return $this->hasMany(MedicalPrescription::class);
    }

    public function treatment()
    {
        return $this->hasMany(Treatment::class);
    }

    public function controlScedules()
    {
        return $this->hasOne(ControlSchedule::class);
    }

    public function inpatient()
    {
        return $this->belongsTo(Inpatient::class);
    }
}
