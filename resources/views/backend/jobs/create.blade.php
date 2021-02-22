

@extends('layouts.app')

@section('content')
    @include('layouts.sideBar')
    <div class="container mt-5">
        <div class="card card-default">
            <div class="card-header">
                Create job
            </div>

            <div class="card-body">
                @include('partials.errors')
                <form action="{{route('jobs.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Company name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="title">Job Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>

                    <div class="mb-3">
                        <select name="category_id" class="custom-select" required>
                            <option value="">Choose...</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Bayern" name="location">
                        </div>
                        <div class="form-group">
                            <label for="link">Link to Job</label>
                            <input type="text" name="link" class="form-control" id="link" >
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
                            {{old('description')}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for=contact">Contact Email</label>
                        <input type="text" name="contact" class="form-control" id="contact" >
                    </div>

                        <button type="submit" class="btn btn-primary">Add Job</button>
                </form>
            </div>
        </div>
    </div>
@endsection



