

@extends('layouts.app')

@section('content')
    @include('layouts.sideBar')
    <div class="container mt-5">
        <div class="card card-default">
            <div class="card-header">
                Create Category
            </div>
            <div class="card-body">
                @include('partials.errors')
                <form action="{{route('categories.store')}}" method="post" >
                    @csrf
                    <div class="form-group ">
                        <label for="name">Category </label>
                        <input type="text"  id='name' class="form-control" name="name" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Add categories</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



