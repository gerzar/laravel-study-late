<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route('home')}}">Almost TIMES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('about')}}">About</a></li>
                @if(\Auth::user() && \Auth::user()->is_admin)
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                @endif
                @if(\Auth::user())
                    <form method="post" class="nav-item" action="{{route('fortify.logout')}}">
                        @csrf
                        <button class="btn link-button" type="submit">Sign out</button>
                    </form>
                @else
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('login')}}">Login</a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</nav>
