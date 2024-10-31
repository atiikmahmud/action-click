@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                
                <!-- Data Tables -->
                <div class="col-12">
                    <div class="card overflow-hidden">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-truncate">User</th>
                                        <th class="text-truncate">Email</th>
                                        <th class="text-truncate">Role</th>
                                        <th class="text-truncate">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset('admin-assets/img/avatars/1.png') }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
                                                    <small class="text-truncate">@amiccoo</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">susanna.Lind57@gmail.com</td>
                                        <td class="text-truncate">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-vip-crown-line ri-22px text-primary me-2"></i>
                                                <span>Admin</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-label-warning rounded-pill">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset('admin-assets/img/avatars/3.png') }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">Benedetto Rossiter</h6>
                                                    <small class="text-truncate">@brossiter15</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">estelle.Bailey10@gmail.com</td>
                                        <td class="text-truncate">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-edit-box-line text-warning ri-22px me-2"></i>
                                                <span>Editor</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-label-success rounded-pill">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset('admin-assets/img/avatars/2.png') }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">Bentlee Emblin</h6>
                                                    <small class="text-truncate">@bemblinf</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">milo86@hotmail.com</td>
                                        <td class="text-truncate">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-computer-line text-danger ri-22px me-2"></i>
                                                <span>Author</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-label-success rounded-pill">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset('admin-assets/img/avatars/5.png') }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">Bertha Biner</h6>
                                                    <small class="text-truncate">@bbinerh</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">lonnie35@hotmail.com</td>
                                        <td class="text-truncate">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-edit-box-line text-warning ri-22px me-2"></i>
                                                <span>Editor</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-label-warning rounded-pill">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset('admin-assets/img/avatars/4.png') }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">Beverlie Krabbe</h6>
                                                    <small class="text-truncate">@bkrabbe1d</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">ahmad_Collins@yahoo.com</td>
                                        <td class="text-truncate">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-pie-chart-2-line ri-22px text-info me-2"></i>
                                                <span>Maintainer</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-label-success rounded-pill">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset('admin-assets/img/avatars/7.png') }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">Bradan Rosebotham</h6>
                                                    <small class="text-truncate">@brosebothamz</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">tillman.Gleason68@hotmail.com</td>
                                        <td class="text-truncate">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-edit-box-line text-warning ri-22px me-2"></i>
                                                <span>Editor</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-label-warning rounded-pill">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset('admin-assets/img/avatars/6.png') }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">Bree Kilday</h6>
                                                    <small class="text-truncate">@bkildayr</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">otho21@gmail.com</td>
                                        <td class="text-truncate">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-user-3-line ri-22px text-success me-2"></i>
                                                <span>Subscriber</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-label-success rounded-pill">Active</span>
                                        </td>
                                    </tr>
                                    <tr class="border-transparent">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset('admin-assets/img/avatars/1.png') }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">Breena Gallemore</h6>
                                                    <small class="text-truncate">@bgallemore6</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">florencio.Little@hotmail.com</td>
                                        <td class="text-truncate">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-user-3-line ri-22px text-success me-2"></i>
                                                <span>Subscriber</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-label-secondary rounded-pill">Inactive</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/ Data Tables -->
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div
                    class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="text-body mb-2 mb-md-0">
                        © Copyright
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        {{ env('APP_NAME') }}
                    </div>
                    <div class="d-none d-lg-inline-block">
                        Developed by <a href="https://atiikmahmud.github.io/" class="footer-link me-4"
                            target="_blank">Atik Mahmud</a>

                    </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection