<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cash extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cash';

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
