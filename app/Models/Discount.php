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
        'valid_from',
        'valid_to',
    ];

    protected $casts = [
        'valid_from' => 'date',
        'valid_to' => 'date',
    ];

    public function igloo()
    {
        return $this->belongsTo(Igloo::class);
    }
}
