<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ControlSchedule extends Model
{
    use HasFactory;
    
    protected $fillable = ['date_control', 'description', 'medical_record_id'];


    protected $table = 'control_schedules';

    protected $casts = [
        'date_control' => 'date',
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
