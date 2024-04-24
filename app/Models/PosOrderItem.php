<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosOrderItem extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(FinishedProduct::class, 'finished_product_id');
    }
}
