<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class AllJobsController extends Controller
{
    public  function index()
    {
        $jobs=Job::latest()->simplePaginate(8);
        return view('backend.jobs.index',compact('jobs'));
    }
}
