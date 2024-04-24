<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolisherStep extends Model
{
    use HasFactory;

    public function polishingType()
    {
        return $this->belongsTo(PolishingType::class, 'polishing_type');
    }
}
