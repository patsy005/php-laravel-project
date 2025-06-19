<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';

    protected $fillable = [
        'igloo_id',
        'name',
        'discount_percentage',
        'description',
    ];

    public function igloo()
    {
        return $this->belongsTo(Igloo::class);
    }
}
