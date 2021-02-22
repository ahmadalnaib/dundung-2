<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserJobController extends Controller
{
    public function index(User $user)
    {
        $jobs=$user->jobs()->simplePaginate(8);
        $categories=Category::all();
       return view('frontend.users.index',compact('jobs','user','categories'));
    }
}
