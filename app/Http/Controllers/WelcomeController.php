<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $jobs=Job::with('user')->latest()->simplePaginate(8);
        $categories=Category::all();
        return view('welcome',compact('jobs','categories'));
    }


}
