<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function adminDashboard(Request $request){
        return view('pages.admin-pages.admin-dashboard.dashboard-page');
    }
}
