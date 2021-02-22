<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryJobController extends Controller
{
    public function index(Category $category)
    {
        $jobs=$category->jobs()->simplePaginate(8);
        $categories=Category::all();
        return view('frontend.category.index',compact('jobs','categories'));
    }
}
