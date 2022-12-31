<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ControlSchedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    protected $table = 'control_schedules';

    protected $casts = [
        'date_control' => 'date',
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
