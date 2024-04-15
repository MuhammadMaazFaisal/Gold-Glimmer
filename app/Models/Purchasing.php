<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasing extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false; 

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function purchasingDetails()
    {
        return $this->hasMany(PurchasingDetail::class, 'p_id', 'id');
    }
}
