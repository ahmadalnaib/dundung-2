@extends('layouts.app')
@section('content')
    @include('layouts.sideBar')

    <div class="container mt-5">



        <div class="card card-default">
            <div class="card-header">Users {{$users->count()}}</div>

            @if($users->count())
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>

                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>
                                    <p>{{$user->name}}</p>
                                </td>

                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->created_at}}</td>


                        @endforeach

                        </tbody>
                    </table>

                </div>

            @else
                <div class="lead text-center">
                    <p>There are no user</p>
                </div>
            @endif
        </div>
    </div>
@endsection
