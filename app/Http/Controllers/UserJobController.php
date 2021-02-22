<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserJobController extends Controller
{
    public function index(User $user)
    {
        $jobs=$user->jobs()->simplePaginate(3);
       return view('frontend.users.index',compact('jobs','user'));
    }
}
