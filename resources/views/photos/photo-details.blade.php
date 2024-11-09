@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
        data-image-src="{{ asset('assets/img/hero.jpg') }}">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">{{ $photo->name }}</h2>
        </div>
        <div class="row tm-mb-90">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <img id="main-image" src="{{ asset('admin-assets/img/photos') }}/{{ $photo->image }}" alt="Image"
                    class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <div class="d-flex flex-wrap">
                        <div class="mr-4">
                            <p><strong>Title: </strong>{{ $photo->name }}</p>
                            <p><strong>Tag: </strong>{{ $photo->tag }}</p>
                            <p><strong>Upload on: </strong>{{ date('d M Y', strtotime($photo->created_at)) }}</p>
                            <p><strong>Upload by: </strong>{{ $photo->user->name }}</p>
                            <p id="extension"></p>
                            <p id="filesize"></p>
                            <p id="dimensions"><strong>Dimensions: </strong><span class="tm-text-primary">1920x1080</span>
                            </p>
                            <input type="hidden" id="site-name" value="{{ env('APP_NAME') }}">
                        </div>
                    </div>
                    <div class="">
                        <h3 class="tm-text-gray-dark mb-3">License</h3>
                        <p>Free for both personal and commercial use. No need to pay anything. No need to make any
                            attribution.</p>
                    </div>
                    <div class="text-center">
                        <button type="button" id="download-btn" class="btn btn-primary tm-btn-big">Download</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Related Photos
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @foreach ($related_photos as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset('admin-assets/img/photos') }}/{{ $item->image }}" alt="{{ $item->name }}"
                            class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{ $item->name }}</h2>
                            <a href="{{ route('photo.details', ['id' => $item->id]) }}">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{ date('d M Y', strtotime($item->created_at)) }}</span>
                        <span>{{ $item->view_count == null ? 0 : $item->view_count }} views</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            const imageUrl = $('#main-image').attr('src');
            const fileName = imageUrl.substring(imageUrl.lastIndexOf('/') + 1);
            const extension = fileName.split('.').pop().toLowerCase();
            const ext = extension.toUpperCase();

            $('#extension').html("<strong>Format:</strong> " + ext);

            const image = new Image();
            image.src = imageUrl;
            image.onload = function() {
                const width = image.width;
                const height = image.height;
                const estimatedSizeInBytes = width * height * 3;
                const filesize = estimatedSizeInBytes.toLocaleString();
                const dimensions = `${image.width} x ${image.height}`;

                $("#filesize").html("<strong>File size: </strong>" + filesize + " bytes");
                $("#dimensions").html("<strong>Dimensions: </strong><span class='tm-text-primary'>" +
                    dimensions + "</span>");
            };
        });

        $(function() {
            $('#download-btn').click(function() {
                var siteName = $('#site-name').val();
                var siteName = siteName.replace(/\s+/g, '_');         
                var imageUrl = $('#main-image').attr('src');
                var a = document.createElement('a');
                a.href = imageUrl;
                a.download = siteName+' '+imageUrl.substring(imageUrl.lastIndexOf('/') + 1);
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            });
        });
    </script>
@endpush
