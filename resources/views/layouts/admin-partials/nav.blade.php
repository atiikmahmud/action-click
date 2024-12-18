<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="ri-menu-fill ri-24px"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center mobile-view-logo">
            <div class="app-brand demo">
                <a href="{{ route('admin.index') }}" class="app-brand-link">
                    <span class="app-brand-logo demo me-1">
                        <img src="{{ asset('admin-assets/img/logo/logo.png') }}" alt="{{ env('APP_NAME') }}"
                            height="35" width="35">
                    </span>
                    <span class="app-brand-text demo menu-text fw-semibold ms-2">{{ env('APP_NAME') }}</span>
                </a>
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ Auth::user()->image ? asset('admin-assets/img/avatars/' . Auth::user()->image) : asset('admin-assets/img/avatars/1.png') }}"
                            alt="{{ Auth::user()->name }}" class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.user.profile') }}">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar avatar-online">
                                        <img src="{{ Auth::user()->image ? asset('admin-assets/img/avatars/' . Auth::user()->image) : asset('admin-assets/img/avatars/1.png') }}"
                                            alt="{{ Auth::user()->name }}" class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 small">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.user.profile') }}">
                            <i class="ri-user-3-line ri-22px me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="ri-settings-4-line ri-22px me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('home.index') }}">
                            <i class="ri-pages-line ri-22px me-2"></i>
                            <span class="align-middle">Visit Site</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <div class="d-grid px-4 pt-2 pb-1">
                            <a class="btn btn-danger d-flex" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <small class="align-middle">Logout</small>
                                <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- End User -->
        </ul>
    </div>
</nav>
