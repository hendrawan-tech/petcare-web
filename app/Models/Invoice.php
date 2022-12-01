<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['total', 'code', 'status', 'type', 'medical_record_id'];


    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function itemInvoices()
    {
        return $this->hasMany(ItemInvoice::class);
    }
}
