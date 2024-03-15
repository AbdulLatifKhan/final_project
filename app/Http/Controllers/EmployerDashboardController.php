<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerDashboardController extends Controller
{
    public function EmployerDashboard(Request $request){
        return view('pages.employer-pages.employer-dashboard.dashboard-page');
    }

}
