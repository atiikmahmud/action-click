@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partials.alert')
                <div class="card mb-6">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header">{{ $title }} Edit</h5>
                        <h5 class="card-header">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                                <span class="tf-icons ri-arrow-go-back-line ri-16px me-1_5"></span>Back
                            </a>
                        </h5>
                    </div>
                    <!-- Account -->
                    <form action="{{ route('admin.user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-6">
                                <div id="imgpreview">
                                    <img src="{{ $user->image ? asset('admin-assets/img/avatars/' . $user->image) : asset('admin-assets/img/avatars/1.png') }}"
                                        alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" />
                                </div>
                                <div id="upload-file" class="button-wrapper">
                                    <label class="btn btn-sm btn-primary me-3 mb-4" tabindex="0" for="myFile">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="ri-upload-2-line d-block d-sm-none"></i>
                                        <input type="file" id="myFile" name="image" class="account-file-input"
                                            hidden accept="image/png, image/jpeg, image/jpg" />
                                    </label>
                                    @if ($user->image)
                                        <a href="{{ route('user.avatar.remove', ['id' => $user->id]) }}"
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
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}"
                                            placeholder="John" autofocus required />
                                        <label for="name">Name</label>
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
                                        <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}"
                                            placeholder="john.doe@example.com" required />
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
                                            <input type="text" id="phone" name="phone" class="form-control"
                                                placeholder="01700123456" minlength="11" maxlength="11" required value="{{ $user->phone }}"/>
                                            <label for="phone">Phone Number</label>
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
                                        <select id="role" name="role" class="select2 form-select" required>
                                            <option value="">Select Role</option>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                                            <option value="user" {{ $user->role == 'user' ? 'selected' : ''}}>User</option>
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
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}"
                                            placeholder="Address" />
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
                                        <input class="form-control" type="text" id="state" name="state" value="{{ $user->state }}"
                                            placeholder="Dhaka" />
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
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ $user->zip_code }}"
                                            placeholder="1200" maxlength="4" />
                                        <label for="zip_code">Zip Code</label>
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
                                        <select id="status" name="status" class="select2 form-select" required>
                                            <option value="">Select Status</option>
                                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="disabled" {{ $user->status == 'disabled' ? 'selected' : '' }}>Disable</option>
                                            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                    @error('status')
                                        <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                            {{ $message }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline" required>
                                        <input class="form-control" type="password" id="password" name="password"
                                            placeholder="********" minlength="8" />
                                        <label for="state">Password</label>
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                            {{ $message }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="********" minlength="8" />
                                        <label for="zipCode">Confirm Password</label>
                                    </div>
                                    @error('password_confirmation')
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
                                <a href="{{ route('admin.user.profile.edit', ['id' => $user->id]) }}" class="btn btn-outline-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                    <!-- /Account -->
                </div>
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
        });
    </script>
@endpush
