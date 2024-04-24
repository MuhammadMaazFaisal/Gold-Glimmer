<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneSetterStep extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function zircons()
    {
        return $this->hasMany(Zircon::class);
    }

    public function stones()
    {
        return $this->hasMany(Stone::class);
    }
    
}
