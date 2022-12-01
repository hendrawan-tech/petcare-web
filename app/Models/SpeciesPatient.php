<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpeciesPatient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $table = 'species_patients';

    public function patients()
    {
        return $this->hasMany(Patient::class, 'speciesPatient_id');
    }
}
