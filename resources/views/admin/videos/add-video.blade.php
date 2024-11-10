@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partials.alert')
                <div class="card mb-5">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header">Upload New Video</h5>
                        <h5 class="card-header">
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-primary">
                                <span class="tf-icons ri-arrow-go-back-line ri-16px me-1_5"></span>Back
                            </a>
                        </h5>
                    </div>
                    <!-- Account -->
                    <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-body">
                                <div class="">
                                    <div id="imgpreview" class="mb-4">
                                        <img id="video-thumb"
                                            src="{{ asset('admin-assets/img/backgrounds/upload-video.png') }}"
                                            alt="user-avatar" class="d-block w-auto h-px-300 rounded" />

                                        <video muted controls id="tm-video"
                                            class="d-block w-auto h-px-300 rounded d-none">
                                            <source src="" type="video/mp4">
                                        </video>
                                    </div>
                                    <div id="upload-file" class="button-wrapper">
                                        <label class="btn btn-sm btn-primary me-3 mb-4" tabindex="0" for="myFile">
                                            <span class="d-none d-sm-block">Upload new video</span>
                                            <i class="ri-upload-2-line d-block d-sm-none"></i>
                                            <input type="file" id="myFile" name="video" class="account-file-input"
                                                hidden accept="video/mp4,video/mov,video/avi,video/wmv" />
                                        </label>

                                        <div>Allowed MP4, MOV, AVI or WMV. Max size of 20MB. Max ratio (1920 x 1080).</div>

                                        @error('video')
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
                                    <a href="{{ route('admin.video.add') }}" class="btn btn-outline-secondary">Reset</a>
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
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var videoUrl = e.target.result;

                    $('#tm-video source').attr('src', videoUrl);
                    $("#video-thumb").addClass('d-none');
                    $("#tm-video").removeClass('d-none');
                    $("#tm-video")[0].load();
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endpush
