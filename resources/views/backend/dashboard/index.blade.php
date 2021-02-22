@extends('layouts.app')


@section('content')
    @include('layouts.sideBar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="row">
               <div class="col-md-4">
                   <div class="card text-white bg-dark">
                       <div class="card-header text-center">Users</div>
                       <div class="card-body text-center">{{$users->count()}}</div>
                   </div>
               </div>

                   <div class="col-md-4">
                       <div class="card text-white bg-dark">
                           <div class="card-header text-center">Jobs</div>
                           <div class="card-body text-center">{{$jobs->count()}}</div>
                       </div>
                   </div>

                   <div class="col-md-4">
                       <div class="card text-white bg-dark">
                           <div class="card-header text-center">Categories</div>
                           <div class="card-body text-center">{{$categories->count()}}</div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
