@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partials.alert')
                <div class="card mb-5">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header">Upload New Photo</h5>
                        <h5 class="card-header">
                            <a href="{{ route('admin.photos.index') }}" class="btn btn-primary">
                                <span class="tf-icons ri-arrow-go-back-line ri-16px me-1_5"></span>Back
                            </a>
                        </h5>
                    </div>
                    <!-- Account -->
                    <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-body">
                                <div class="">
                                    <div id="imgpreview" class="mb-4">
                                        <img src="{{ asset('admin-assets/img/backgrounds/upload-photo.png') }}" alt="user-avatar"
                                            class="d-block w-auto h-px-300 rounded" />
                                    </div>
                                    <div id="upload-file" class="button-wrapper">
                                        <label class="btn btn-sm btn-primary me-3 mb-4" tabindex="0" for="myFile">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="ri-upload-2-line d-block d-sm-none"></i>
                                            <input type="file" id="myFile" name="image" class="account-file-input"
                                                hidden accept="image/png, image/jpeg, image/jpg" />
                                        </label>

                                        <div>Allowed JPG, JPEG or PNG. Max size of 2MB. Max ratio (1920 x 1080).</div>

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
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="text" id="name" name="name"
                                                placeholder="John" autofocus required />
                                            <label for="name">Title</label>
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" id="tag" name="tag"
                                                placeholder="Tag" />
                                            <label for="address">Tag</label>
                                        </div>
                                        @error('tag')
                                            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <button type="submit" class="btn btn-primary me-3">Save</button>
                                    <a href="{{ route('admin.photo.add') }}" class="btn btn-outline-secondary">Reset</a>
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
