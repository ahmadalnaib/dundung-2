@extends('layouts.app')

@section('content')

    <!-- showcase -->
    <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">
                <h1>Simply get the right job. With DunDung.</h1>
                <p>With DunDung you can quickly find the best job for yourself. best platform for find a job.</p>
                <a href="jobs.html" class="btn btn-outline"> Browse the jobs</a>
            </div>

            <div class="showcase-form card">
                <h2>Discover your next  Job</h2>
                <form action="">
                    <div class="form-control">
                        <input type="text" name="search" placeholder=" 🔎" required>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <!-- Popular jobs -->
    <section class="jobs">
        <div class="container">
            <h3 class="jobs-heading text-center my-1">Welcome to the best platform for found a job of all types</h3>
            <div class="grid gird-3 text-center my-4">
                <div>
                    <i class="fas fa-bullhorn fa-3x"></i>
                    <h3>1,485,166</h3>
                    <p class="text-secondary">Jobs</p>
                </div>
                <div>
                    <i class="fas fa-users fa-3x"></i>
                    <h3>1,300,000</h3>
                    <p class="text-secondary">Refugees</p>
                </div>
            </div>
        </div>
    </section>

    <!-- all jobs -->
    <section class="show-jobs bg-primary py-2">
        <div class="container-jobs">
            <h2 class="">Popular Jobs</h2>
            <div class="show-jobs-text  py-2">
                @foreach($categories as $category)
                <a href="">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
    </section>


{{--  jobs  --}}

    <section class="lang">
        <div class="container">
            @foreach($jobs as $job)
                <div  class="all-jobs grid-2 card">
                    <div class="img-alll">
                        <img class="img-all"  src="{{asset('storage/'.$job->image)}}" alt="">
                    </div>

                    <div class="flex-1">
                        <a href="">{{$job->title}}</a>
                        <span>{{$job->name}}</span>
                        <span>{{$job->location}}</span>
                    </div>
                   <div>
                       <h5>📍 {{$job->created_at->diffForHumans()}}</h5>
                   </div>

                  <div>
                      <a class="view" target="_blank" href="{{route('jobs.show',$job)}}">VIEW</a>
                  </div>

                </div>


            @endforeach
                {!! $jobs->links() !!}
        </div>

    </section>

{{--footer--}}

<footer class="footer bg-dark py-5">
<div class="container grid grid-2">
    <div>
        <h1>DunDung</h1>
        <p>copyright &copy; 2021</p>
    </div>
    <nav>
        <ul>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Priveic</a></li>
        </ul>
    </nav>

    <div class="social">
        <a href="#">Twitter</a>
    </div>

</div>
</footer>


@endsection
