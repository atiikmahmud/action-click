@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partials.alert')
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
                                            class="btn btn-sm btn-outline-danger account-image-reset mb-4"
                                            title="Remove avatar">
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
                                            value="{{ $user->name }}" placeholder="John" autofocus required
                                            autocomplete="off" />
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
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="email" value="{{ $user->email }}"
                                                placeholder="john.doe@example.com" />
                                            <label for="email">E-mail</label>
                                        </div>
                                        <span class="input-group-text">(NO CHANGE)</span>
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
                                                value="{{ $user->phone }}" class="form-control" placeholder="01700123456"
                                                minlength="11" maxlength="11" required autocomplete="off" />
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
                                        <select class="select2 form-select">
                                            <option value="" class="text-captalize">{{ ucfirst($user->role) }}
                                            </option>
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
                                            value="{{ $user->address }}" placeholder="Address" autocomplete="off" />
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
                                            value="{{ $user->state }}" placeholder="Dhaka" autocomplete="off" />
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
                                            value="{{ $user->zip_code }}" placeholder="1200" maxlength="4"
                                            autocomplete="off" />
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
                                        <input class="form-control" type="password" id="c_password" name="c_password"
                                            placeholder="********" minlength="8" autocomplete="off" />
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
                                            name="new_password" placeholder="********" minlength="8"
                                            autocomplete="off" />
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
                                            name="con_password" placeholder="********" minlength="8"
                                            autocomplete="off" />
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
                                <a href="{{ route('admin.user.profile') }}" class="btn btn-outline-secondary"
                                    title="Reset form">Reset</a>
                            </div>
                        </div>
                    </form>
                    <!-- /Account -->
                </div>

                @if ($user->id !== 1 || $user->role !== 'admin')
                    <div class="card">
                        <h5 class="card-header">Delete Account</h5>
                        <div class="card-body">
                            <form id="formAccountDeactivation" action="{{ route('user.disabled') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="form-check mb-6 ms-3">
                                    <input class="form-check-input" type="checkbox" name="accountActivation"
                                        id="accountActivation" required />
                                    <label class="form-check-label" for="accountActivation">I confirm my account
                                        deactivation</label>
                                </div>
                                <button type="submit" id="accountActivationBtn"
                                    class="btn btn-danger deactivate-account" disabled="disabled" onclick="return confirm('Are you sure, deactive your account ?')">
                                    Deactivate Account
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
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

            $("#accountActivation").change(function() {
                if ($(this).is(":checked")) {
                    $("#accountActivationBtn").prop("disabled", false);
                } else {
                    $("#accountActivationBtn").prop("disabled", true);
                }
            });
        });
    </script>
@endpush
