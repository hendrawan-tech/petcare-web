<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PracticeSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['day', 'start_time', 'end_time', 'user_id'];

    protected $table = 'practice_schedules';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
