@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card card-default">
            <div class="card-header">
                Edit Job
            </div>

            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('jobs.update',$job->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Company name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$job->name}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="title">Job Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$job->title}}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <select name="category_id" class="custom-select" required>
                            <option value="">Choose...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $job->category_id) selected @endif>
                                    {{$category->name}}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" placeholder="Bayern" name="location" value="{{$job->location}}">
                    </div>
                    <div class="form-group">
                        <label for="link">Link to Job</label>
                        <input type="text" name="link" class="form-control" id="link" value="{{$job->link}}">
                    </div>



                        <div class="form-group">
                            <img src="{{asset('storage/'.$job->image)}}" alt="" style="width: 100%">

                        </div>

                    <div class="input-group mb-3 mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image" aria-describedby="image">Image</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                        {{$job->description}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for=contact">Contact Email</label>
                        <input type="text" name="contact" class="form-control" id="contact"  value="{{$job->contact}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">save Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
