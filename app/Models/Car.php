<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // ✅ CORRECT for new package


class Car extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'cars';

    protected $fillable = [
        'dealer_id',
        'make',
        'model',
        'year',
        'price',
        'description',
        'images',
        'fuel',
    ];

 public function user()
    {
        return $this->belongsTo(User::class);
    }
}
