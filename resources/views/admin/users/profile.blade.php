@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-6">
                        <!-- Account -->
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-6">
                                <img src="{{ asset('admin-assets/img/avatars/1.png') }}" alt="user-avatar"
                                    class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-sm btn-primary me-3 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="ri-upload-2-line d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" hidden
                                            accept="image/png, image/jpeg" />
                                    </label>
                                    <button type="button" class="btn btn-sm btn-outline-danger account-image-reset mb-4">
                                        <i class="ri-refresh-line d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>

                                    <div>Allowed JPG, JPEG or PNG. Max size of 1024K</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                <div class="row mt-1 g-5">
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="firstName" name="firstName" value="{{ $user->name }}"
                                                placeholder="John" autofocus />
                                            <label for="firstName">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="email" name="email" value="{{ $user->email }}" placeholder="john.doe@example.com" />
                                            <label for="email">E-mail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="phoneNumber" name="phone" value="{{ $user->phone }}" 
                                                    class="form-control" placeholder="01700123456" />
                                                <label for="phoneNumber">Phone Number</label>
                                            </div>
                                            <span class="input-group-text">BD (+88)</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="country" class="select2 form-select">
                                                <option value="">Select Role</option>
                                                <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                                                <option value="user" @if ($user->role == 'user') selected @endif>User</option>
                                            </select>
                                            <label for="country">Role</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}"
                                                placeholder="Address" />
                                            <label for="address">Address</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="state" name="state" value="{{ $user->state }}"
                                                placeholder="Dhaka" />
                                            <label for="state">State</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" id="zipCode" name="zip_code" value="{{ $user->zip_code }}" 
                                                placeholder="1200" maxlength="6" />
                                            <label for="zipCode">Zip Code</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="language" class="select2 form-select">
                                                <option value="">Select Status</option>
                                                <option value="1" @if ($user->status == 1) selected @endif>Active</option>
                                                <option value="0" @if ($user->status == 0) selected @endif>Disable</option>
                                            </select>
                                            <label for="language">Status</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="password" id="state" name="state"
                                                placeholder="********" minlength="8"/>
                                            <label for="state">Current Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="password" id="state" name="state"
                                                placeholder="********" minlength="8"/>
                                            <label for="state">New Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" class="form-control" id="zipCode" name="zipCode"
                                                placeholder="********" minlength="8" />
                                            <label for="zipCode">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                    <a href="{{ route('admin.user.profile') }}" class="btn btn-outline-secondary">Reset</a>
                                </div>
                            </form>
                        </div>
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
