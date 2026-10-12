<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Organization;
use App\Models\Officer;
use App\Models\Event;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'studentCount' => Student::count(),
            'organizationCount' => Organization::count(),
            'officerCount' => Officer::count(),
            'eventCount' => Event::count(),
            'membershipCount' => Membership::count(),
            'upcomingEvents' => Event::with('organization')
                ->where('status', 'upcoming')
                ->orderBy('start_at')
                ->take(5)
                ->get(),
        ]);
    }
}
