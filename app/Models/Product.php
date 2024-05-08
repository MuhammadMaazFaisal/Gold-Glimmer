<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false; 

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type');
    }

    public function polisherStep()
    {
        return $this->hasOne(PolisherStep::class, 'product_id', 'id');
    }
    
}
