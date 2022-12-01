<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alumni',
        'specialist',
        'str_number',
        'experience',
    ];

    protected $table = 'user_metas';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
