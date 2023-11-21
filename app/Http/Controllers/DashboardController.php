<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Client;
use App\Schedule;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'agents' => Agent::count(),
            'clients' => Client::count(),
            'schedules' => Schedule::count(),
            'recent_schedules' => Schedule::with(['client'])->limit(10)->get(),
        );
        return view('dashboard', $data);
    }
}
