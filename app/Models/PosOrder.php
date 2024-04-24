<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosOrder extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(PosOrderItem::class);
    }

    public function finishedProducts()
    {
        return $this->hasManyThrough(FinishedProduct::class, PosOrderItem::class, 'pos_order_id', 'id', 'id', 'finished_product_id');
    }
}
