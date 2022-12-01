<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'product_id'];


    protected $table = 'order_items';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
