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
        <li class="menu-item active">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div>Dashboard</div>
            </a>
        </li>
    </ul>
</aside>
