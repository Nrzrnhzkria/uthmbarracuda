<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AthleteDetails;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = User::where('is_active', 1)->where('is_coach', 0)->orderby('first_name', 'asc')->get();
        $athlete_details = AthleteDetails::all();

        $active_users = count($users);
        $high_users = User::where('is_active', 1)->where('is_highperformance', 1)->count();
        $coaches = User::where('is_coach', 1)->count();
        $admin_users = User::where('is_admin', 1)->count();

        // $active_men = AthleteDetails::where('gender', 'Men')->count();
        // $active_women = AthleteDetails::where('gender', 'Women')->count();
       

        $i = 0;

        return view('admin.dashboard', compact('active_users', 'high_users', 'coaches', 'admin_users', 'users', 'athlete_details', 'i'));
    }
}
