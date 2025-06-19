<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'street',
        'street_number',
        'house_number',
        'city',
        'country',
        'postal_code',
        'created_at',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class, 'igloo_id');
    }
}
