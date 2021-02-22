<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class FrontJobsController extends Controller
{
    public  function index()
    {
        $jobs=Job::with('user')->latest()->simplePaginate(8);
        $categories=Category::all();
        return view('frontend.jobs.index',compact('jobs','categories'));
    }
}
