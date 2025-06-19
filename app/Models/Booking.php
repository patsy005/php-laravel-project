<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    const CREATED_AT = 'booking_date';

    protected $table = 'booking';

    protected $fillable = [
        'igloo_id',
        'check_in_date',
        'check_out_date',
        'payment_method_id',
        'amount',
        'booking_date',
        'notes',
        'user_id',
        'employee_id',
        'early_check_in',
        'late_check_out'
    ];

    protected $casts = [
        'check_in_date' => 'datetime',
        'check_out_date' => 'datetime',
    ];


    public function igloo()
    {
        return $this->belongsTo(Igloo::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class)->withDefault();
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
}
