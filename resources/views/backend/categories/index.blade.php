@extends('layouts.app')
@section('content')
    @include('layouts.sideBar')
    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{route('categories.create')}}" class="btn btn-success">Add category</a>
        </div>


        <div class="card card-default">
            <div class="card-header">category</div>

            @if($categories->count())
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Name</th>
                        <th>Date</th>
                        <th></th>
                        <th>Action</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <p>{{$category->name}}</p>
                                </td>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td>
                                        <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                </td>
                                <td>
                                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-dark">Edit</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {!! $categories->links() !!}
                </div>



            @else
                <div class="lead text-center">
                    <p>There are no categories</p>
                </div>
            @endif
        </div>
    </div>
@endsection
