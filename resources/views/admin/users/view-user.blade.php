@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partials.alert')
                <div class="card mb-6">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header">{{ $title }}</h5>
                        <h5 class="card-header">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                                <span class="tf-icons ri-arrow-go-back-line ri-16px me-1_5"></span>Back
                            </a>
                        </h5>
                    </div>
                    <!-- Account -->
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-6">
                                <div id="imgpreview">
                                    <img src="{{ $user->image ? asset('admin-assets/img/avatars/' . $user->image) : asset('admin-assets/img/avatars/1.png') }}" alt="{{ $user->name }}" title="{{ $user->name }}"
                                        class="d-block w-px-100 h-px-100 rounded" />
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 mb-3">
                            <div class="row mt-1 g-5">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}"
                                            placeholder="John" autofocus required readonly/>
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}"
                                            placeholder="john.doe@example.com" required readonly/>
                                        <label for="email">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control"
                                                placeholder="01700123456" minlength="11" maxlength="11" required readonly/>
                                            <label for="phone">Phone Number</label>
                                        </div>
                                        <span class="input-group-text">BD (+88)</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="role" name="role" value="{{ ucfirst($user->role) }}"
                                            placeholder="User" autofocus required readonly/>
                                        <label for="role">Role</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}"
                                            placeholder="Address" readonly/>
                                        <label for="address">Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="state" name="state" value="{{ $user->state }}"
                                            placeholder="Dhaka" readonly/>
                                        <label for="state">State</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ $user->zip_code }}"
                                            placeholder="1200" maxlength="4" readonly/>
                                        <label for="zip_code">Zip Code</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="status" name="status" value="{{ ucfirst($user->status) }}"
                                            placeholder="active" autofocus required readonly/>
                                        <label for="status">Status</label>
                                    </div>
                                </div>
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
