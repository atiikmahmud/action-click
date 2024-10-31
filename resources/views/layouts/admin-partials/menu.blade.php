<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                <img src="{{ asset('admin-assets/img/logo/logo.png') }}" alt="{{ env('APP_NAME') }}" height="35" width="35">
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">{{ env('APP_NAME') }}</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item @if ($title == 'Dashboard') active @endif">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ri-folder-image-line"></i>
                <div>Photos</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ri-movie-line"></i>
                <div>Videos</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ri-discuss-line"></i>
                <div>Contacts</div>
            </a>
        </li>
        <li class="menu-item @if ($title == 'Users') active @endif">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-group-line"></i>
                <div>Users</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ri-settings-5-line"></i>
                <div>Settings</div>
            </a>
        </li>
    </ul>
</aside>
