<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Igloo extends Model
{
    protected $table = 'igloos';

    protected $fillable = [
        'name',
        'location',
        'capacity',
        'description',
        'price_per_night',
        'image',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'igloo_id');
    }

    public function discount()
    {
        return $this->hasOne(Discount::class, 'igloo_id')->latest();
    }
    public function getActiveDiscounts()
    {
        return $this->discounts()->where('discount_percentage', '>', 0)->get();
    }
}
