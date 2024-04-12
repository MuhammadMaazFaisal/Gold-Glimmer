<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $fillable = [
        'id',
        'name',
        'phone',
        'address',
        'type',
        '18k',
        '21k',
        '22k',
        'status',
    ];
}
