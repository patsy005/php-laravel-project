<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

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
        'role_id',
        'created_at',
        'image',
        'login',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(EmployeeRole::class, 'role_id');
    }
}
