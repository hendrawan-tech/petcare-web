<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens;

    protected $guarded = [
        'id'
    ];

    protected $hidden = ['password', 'verified'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function userMetas()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function practiceSchedules()
    {
        return $this->hasMany(PracticeSchedule::class);
    }

    public function hasVerifiedPhone()
    {
        return (bool)$this->verified;
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'verified' => true,
        ])->save();
    }
}
