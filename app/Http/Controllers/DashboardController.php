<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users=User::all();
        $jobs=Job::all();
        $categories=Category::all();
        return view('backend.dashboard.index',compact('users','jobs','categories'));
    }
}
