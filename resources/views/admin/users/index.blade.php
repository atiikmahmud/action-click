@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header">Users</h5>
                    <h5 class="card-header">
                        <a href="{{ route('admin.user.add') }}" class="btn btn-primary">
                            <span class="tf-icons ri-add-circle-line ri-16px me-1_5"></span>Add User
                        </a>
                    </h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>01</td>
                                <td>Atik Mahmud</td>
                                <td>atik@test.com</td>
                                <td><span class="badge rounded-pill bg-label-info me-1" title="Admin"><i class="ri-admin-line"></i></span></td>
                                <td><span class="badge rounded-pill bg-label-success me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ri-more-2-line"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="ri-user-search-line me-1"></i> Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-pencil-line me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-6-line me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Adib Mahmud</td>
                                <td>adib@test.com</td>
                                <td><span class="badge rounded-pill bg-label-primary me-1" title="User"><i class="ri-user-3-line"></i></span></td>
                                <td><span class="badge rounded-pill bg-label-success me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ri-more-2-line"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="ri-user-search-line me-1"></i> Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-pencil-line me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-6-line me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>AB Rahim</td>
                                <td>abrahim@test.com</td>
                                <td><span class="badge rounded-pill bg-label-primary me-1" title="User"><i class="ri-user-3-line"></i></span></td>
                                <td><span class="badge rounded-pill bg-label-danger me-1">Disable</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ri-more-2-line"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="ri-user-search-line me-1"></i> Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-pencil-line me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-6-line me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Basic Bootstrap Table -->
        </div>
        <!-- End Content -->

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
