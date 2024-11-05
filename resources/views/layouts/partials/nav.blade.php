<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" height="35" width="35">
            {{ env('APP_NAME') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a
                        class="nav-link nav-link-1 @if ($title == 'Home') active" aria-current="page" @else " @endif href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link nav-link-2 @if ($title == 'Photos' || $title == 'Photo Details') active" aria-current="page" @else " @endif href="{{ route('photo.index') }}">Photos</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link nav-link-3 @if ($title == 'Videos' || $title == 'Video Details') active" aria-current="page" @else " @endif href="{{ route('video.index') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link nav-link-4 @if ($title == 'About') active" aria-current="page" @else " @endif href="{{ route('about.index') }}">About</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link nav-link-5 @if ($title == 'Contact') active" aria-current="page" @else " @endif href="{{ route('contact.index') }}">Contact</a>
                </li>
                <li class="nav-item">
                    @if (Auth::user())
                        <a class="nav-link nav-link-6" href="{{ route('admin.index') }}">Dashboard</a>
                    @else
                        <a class="nav-link nav-link-6" href="{{ route('login') }}">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
