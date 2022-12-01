<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['urutan', 'patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
