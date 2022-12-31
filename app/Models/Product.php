<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function medicalPrescriptions()
    {
        return $this->hasMany(MedicalPrescription::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
