@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-6">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-header">Add New User</h5>
                        </div>
                        <!-- Account -->
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-6">
                                    <div id="imgpreview">
                                        <img src="{{ asset('admin-assets/img/avatars/1.png') }}" alt="user-avatar"
                                            class="d-block w-px-100 h-px-100 rounded" />
                                    </div>
                                    <div id="upload-file" class="button-wrapper">
                                        <label class="btn btn-sm btn-primary me-3 mb-4" tabindex="0" for="myFile">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="ri-upload-2-line d-block d-sm-none"></i>
                                            <input type="file" id="myFile" name="image" class="account-file-input"
                                                hidden accept="image/png, image/jpeg, image/jpg" />
                                        </label>

                                        <div>Allowed JPG, JPEG or PNG. Max size of 1024K</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row mt-1 g-5">
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="name" name="name"
                                                placeholder="John" autofocus />
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="email" id="email" name="email"
                                                placeholder="john.doe@example.com" />
                                            <label for="email">E-mail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="phone" name="phone" class="form-control"
                                                    placeholder="01700123456" maxlength="11" />
                                                <label for="phone">Phone Number</label>
                                            </div>
                                            <span class="input-group-text">BD (+88)</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="country" class="select2 form-select">
                                                <option value="">Select Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                            <label for="country">Role</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Address" />
                                            <label for="address">Address</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="state" name="state"
                                                placeholder="Dhaka" />
                                            <label for="state">State</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                placeholder="1200" maxlength="4" />
                                            <label for="zip_code">Zip Code</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="language" class="select2 form-select">
                                                <option value="">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Disable</option>
                                            </select>
                                            <label for="language">Status</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="password" id="password" name="password"
                                                placeholder="********" minlength="8" />
                                            <label for="state">New Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="********" minlength="8" />
                                            <label for="zipCode">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <button type="submit" class="btn btn-primary me-3">Submit</button>
                                    <a href="{{ route('admin.user.add') }}" class="btn btn-outline-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                        <!-- /Account -->
                    </div>
                </div>
            </div>
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

@push('scripts')
    <script>
        $(function() {
            $("#myFile").on("change", function(e) {
                const photoInp = $("#myFile");
                const [file] = this.files;
                if (file) {
                    $("#imgpreview img").attr('src', URL.createObjectURL(file));
                    $("#imgpreview").show();
                }
            });
        });
    </script>
@endpush
