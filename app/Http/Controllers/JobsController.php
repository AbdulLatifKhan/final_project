<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function JobsPage(){
        return view('pages.users-pages.users-jobs.jobsPage');
       
     }
}     
