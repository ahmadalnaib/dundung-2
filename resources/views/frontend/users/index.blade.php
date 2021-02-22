@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{route('jobs.create')}}" class="btn btn-success">Add Job</a>
        </div>


        <div class="card card-default">
            <h1>{{$user->companyName}} jobs {{$jobs->count()}}</h1>
            <div class="card-header">Jobs</div>

            @if($jobs->count())
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>


                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>
                                    <div >{{$job->user->companyName}}</div>
                                </td>
                                <td>
                                    <p>{{$job->body}}</p>
                                </td>
                                <td>{{$job->created_at->diffForHumans()}}</td>

                                <td>
                                    @can('delete',$job)
                                        <form action="{{route('jobs.destroy',$job->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">Delete</button>
                                        </form>
                                    @endcan
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
