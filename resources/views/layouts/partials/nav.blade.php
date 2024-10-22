<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <i class="fas fa-film mr-2"></i>
            {{ env('APP_NAME') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 @if ($title == 'Home' || $title == 'Photo Details') active" aria-current="page" @else " @endif href="{{ route('home.index') }}">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2 @if ($title == 'Videos' || $title == 'Video Details') active" aria-current="page" @else " @endif href="{{ route('video.index') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 @if ($title == 'About') active" aria-current="page" @else " @endif href="{{ route('about.index') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4 @if ($title == 'Contact') active" aria-current="page" @else " @endif href="{{ route('contact.index') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
