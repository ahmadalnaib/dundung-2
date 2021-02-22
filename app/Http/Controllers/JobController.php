<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        Eager loading  we add user for queries is important for our app
        //$jobs=Job::with('user')->latest()->simplePaginate(8);

        $jobs=auth()->user()->jobs()->latest()->simplePaginate(2);
        return view('backend.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('backend.jobs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {


        Job::create([
            'name'=>$request->name,
            'title'=>$request->title,
            'location'=>$request->location,
            'description'=>$request->description,
            'image'=> $request->image->store('images','public'),
            'link'=>$request->link,
            'contact'=>$request->contact,
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
        ]);

        return  redirect()->route('jobs.index')
            ->with('success','Job has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {

        return view('frontend.jobs.show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {

        $categories=Category::all();
        return view('backend.jobs.edit',compact('job','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request,Job $job)
    {
        $data=$request->only(['name','title','location','description','link','contact','category_id']);

      if($request->hasFile('image')){
          $image=$request->image->store('images','public');
          Storage::disk('public')->delete($job->image);
          $data['image']=$image;
      }
        $job->update($data);


        return redirect()->route('jobs.index')
            ->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete',$job);
        Storage::disk('public')->delete($job->image);
        $job->delete();
        return redirect()->back();
    }



}
