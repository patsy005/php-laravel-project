<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Employee;
use App\Models\Booking;

class HomeController extends Controller
{
    public function index()
    {
        $employee = Employee::first();

        $numOfBookings = $this->numOfBookings();

        $checkIns = $this->getCheckIns();

        $occupancyRate = $this->occupancyRate();

        return view('home.index', compact('employee', 'numOfBookings', 'checkIns', 'occupancyRate'));
    }

    public function numOfBookings()
    {
        return DB::table('booking')
            ->where('check_in_date', '>=', now()->subDays(30))
            ->count();
    }

    public function getCheckIns()
    {
        return DB::table('booking')
            ->where('check_in_date', '>=', now()->subDays(30))
            ->count();
    }

    public function occupancyRate()
    {
        $numOfIgloos = DB::table('igloos')->count();

        if ($numOfIgloos == 0) {
            return 0; // Avoid division by zero
        }

        $numOfBookings = $this->numOfBookings();

        $rate = ($numOfBookings / $numOfIgloos) * 100;
        return rtrim(rtrim(number_format($rate, 2, '.', ''), '0'), '.');
    }
}
