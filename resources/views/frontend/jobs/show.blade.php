@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                      {{$job->category->name}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$job->title}}</h5>
                        <p class="card-text">{{$job->description}}</p>

                    </div>
                </div>
               </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img class="img-all"  src="{{asset('storage/'.$job->image)}}" alt="">
                        <h5 class="card-title">{{$job->name}}</h5>
                        <p class="card-text">📍 {{$job->location}}</p>
                        <a href="{{$job->link}}" class="btn btn-primary">APPLY</a>
                    </div>
                </div>
            </div>
            </div>
    </div>
    </div>
@endsection
