<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    protected $table = 'employee_role';

    protected $fillable = [
        'name',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'role_id');
    }
}
