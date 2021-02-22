<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{route('jobs.index')}}">Jobs</a>
                </li>
                @if(auth()->user()->isAdmin())
                    <li class="list-group-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                <li class="list-group-item">
                    <a href="{{route('categories.index')}}">Categories</a>
                </li>

                <li class="list-group-item">
                    <a href="{{route('users')}}">Users</a>
                </li>
                    <li class="list-group-item">
                        <a href="{{route('alljobs')}}">All jobs</a>
                    </li>


          @endif
            </ul>

        </div>
    </div>
</div>
