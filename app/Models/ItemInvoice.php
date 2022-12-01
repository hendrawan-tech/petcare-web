<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'description', 'price', 'invoice_id'];


    protected $table = 'item_invoices';

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
