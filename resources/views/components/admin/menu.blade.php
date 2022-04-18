<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" aria-current="page" href="{{route('admin.dashboard')}}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" aria-current="page" href="{{route('admin.news.index')}}">
                    <span data-feather="file-text"></span>
                    News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" aria-current="page" href="{{route('admin.categories.index')}}">
                    <span data-feather="list"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" aria-current="page" href="{{route('admin.users.index')}}">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.feedback.*')) active @endif" aria-current="page" href="{{route('admin.feedback.index')}}">
                    <span data-feather="mail"></span>
                    Messages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.resources.*')) active @endif" aria-current="page" href="{{route('admin.resources.index')}}">
                    <span data-feather="list"></span>
                    Resources
                </a>
            </li>
        </ul>

    </div>
</nav>

