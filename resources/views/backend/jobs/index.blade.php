@extends('layouts.app')
@section('content')
    @include('layouts.sideBar')

    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{route('jobs.create')}}" class="btn btn-success">Add job</a>
        </div>


        <div class="card card-default">
            <div class="card-header">Job</div>

            @if($jobs->count())
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Job title</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Action</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)

                            <tr>
                                <td>
                                    <p>{{$job->title}}</p>
                                </td>
                                <td>{{$job->created_at}}</td>
                                <td><img width="100px" height="100px"  class="img-thumbnail " src="{{asset('storage/'.$job->image)}}" alt=""></td>

                                @can('delete',$job)
                                <td>
                                    <form action="{{route('jobs.destroy',$job->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                                @endcan
                                <td>
                                    <a href="{{route('jobs.edit',$job->id)}}" class="btn btn-dark">Edit</a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    {!! $jobs->links() !!}
                </div>



            @else
                <div class="lead text-center">
                    <p>There are no jobs</p>
                </div>
            @endif
        </div>
    </div>
@endsection
