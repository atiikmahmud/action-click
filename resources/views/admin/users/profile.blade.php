@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card mb-6">
                        <!-- Account -->
                        <div class="d-flex justify-content-between">
                            <h5 class="card-header">Your Profile</h5>
                        </div>
                        <form action="{{ route('admin.user.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-6">
                                    <div id="imgpreview">
                                        <img src="{{ Auth::user()->image ? asset('admin-assets/img/avatars/' . Auth::user()->image) : asset('admin-assets/img/avatars/1.png') }}"
                                            alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" />
                                    </div>
                                    <div id="upload-file" class="button-wrapper">
                                        <label class="btn btn-sm btn-primary me-3 mb-4" tabindex="0" for="myFile">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="ri-upload-2-line d-block d-sm-none"></i>
                                            <input type="file" id="myFile" name="image" class="account-file-input"
                                                hidden accept="image/png, image/jpeg, image/jpg" />
                                        </label>
                                        @if (Auth::user()->image)
                                            <a href="{{ route('user.avatar.remove', ['id' => Auth::user()->id]) }}"
                                                onclick="return confirm('Are you sure remove avatar ?')"
                                                class="btn btn-sm btn-outline-danger account-image-reset mb-4" title="Remove avatar">
                                                <i class="ri-refresh-line d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </a>
                                        @endif

                                        <div>Allowed JPG, JPEG or PNG. Max size of 1024K</div>

                                        @error('image')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row mt-1 g-5">
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="{{ $user->name }}" placeholder="John" autofocus required />
                                            <label for="firstName">Name</label>
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="email" value="{{ $user->email }}"
                                                placeholder="john.doe@example.com" disabled />
                                            <label for="email">E-mail</label>
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="phoneNumber" name="phone"
                                                    value="{{ $user->phone }}" class="form-control"
                                                    placeholder="01700123456" minlength="11" maxlength="11" required />
                                                <label for="phoneNumber">Phone Number</label>
                                            </div>
                                            <span class="input-group-text">BD (+88)</span>
                                        </div>
                                        @error('phone')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select class="select2 form-select" disabled>
                                                <option value="">Select Role</option>
                                                <option value="admin" @if ($user->role == 'admin') selected @endif>
                                                    Admin</option>
                                                <option value="user" @if ($user->role == 'user') selected @endif>
                                                    User</option>
                                            </select>
                                            <label for="role">Role</label>
                                        </div>
                                        @error('role')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $user->address }}" placeholder="Address" />
                                            <label for="address">Address</label>
                                        </div>
                                        @error('address')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="state" name="state"
                                                value="{{ $user->state }}" placeholder="Dhaka" />
                                            <label for="state">State</label>
                                        </div>
                                        @error('state')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" id="zipCode" name="zip_code"
                                                value="{{ $user->zip_code }}" placeholder="1200" maxlength="4" />
                                            <label for="zipCode">Zip Code</label>
                                        </div>
                                        @error('zip_code')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="password" id="c_password"
                                                name="c_password" placeholder="********" minlength="8" />
                                            <label for="c_password">Current Password</label>
                                        </div>
                                        @error('c_password')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="password" id="new_password"
                                                name="new_password" placeholder="********" minlength="8" />
                                            <label for="new_password">New Password</label>
                                        </div>
                                        @error('new_password')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" class="form-control" id="con_password"
                                                name="con_password" placeholder="********" minlength="8" />
                                            <label for="con_password">Confirm Password</label>
                                        </div>
                                        @error('con_password')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                    <a href="{{ route('admin.user.profile') }}"
                                        class="btn btn-outline-secondary" title="Reset form">Reset</a>
                                </div>
                            </div>
                        </form>
                        <!-- /Account -->
                    </div>

                    @if ($user->id !== 1 || $user->role !== 'admin')
                        <div class="card">
                            <h5 class="card-header">Delete Account</h5>
                            <div class="card-body">
                                <form id="formAccountDeactivation" onsubmit="return false">
                                    <div class="form-check mb-6 ms-3">
                                        <input class="form-check-input" type="checkbox" name="accountActivation"
                                            id="accountActivation" />
                                        <label class="form-check-label" for="accountActivation">I confirm my account
                                            deactivation</label>
                                    </div>
                                    <button type="submit" class="btn btn-danger deactivate-account" disabled="disabled">
                                        Deactivate Account
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
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
