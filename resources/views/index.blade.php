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
        <!-- Start Featured Photos Section -->
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Featured Photos
            </h2>
        </div>
        <div class="row tm-mb-40 tm-gallery">
            @php
                $count = count($featured_photos);
                $photoCount = 8 - $count;
            @endphp
            @foreach ($featured_photos as $item)
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
            @if ($photoCount > 0)                
                @for ($i = 1; $i <= $photoCount; $i++)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="{{ asset('admin-assets/img/backgrounds/upload-photo.png') }}" alt="Demo image"
                                class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Demo image</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">No date</span>
                            <span>0 views</span>
                        </div>
                    </div>
                @endfor                
            @endif
        </div>
        <!-- End Featured Photos Section -->

        <!-- Start Featured Videos Section -->
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Featured Videos
            </h2>
        </div>
        <div class="row tm-mb-40 tm-gallery">
            @php
                $vcount = count($featured_videos);
                $videoCount = 8 - $vcount;
            @endphp
            @foreach ($featured_videos as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ asset('admin-assets/img/backgrounds/upload-video.png') }}" alt="{{ $item->name }}"
                            class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{ $item->name }}</h2>
                            <a href="{{ route('video.details', ['id' => $item->id]) }}">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{ date('d M Y', strtotime($item->created_at)) }}</span>
                        <span>{{ $item->view_count == null ? 0 : $item->view_count }} views</span>
                    </div>
                </div>
            @endforeach
            @if ($videoCount > 0)                
                @for ($i = 1; $i <= $videoCount; $i++)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="{{ asset('admin-assets/img/backgrounds/upload-video.png') }}" alt="Demo video"
                                class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>Demo video</h2>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">No date</span>
                            <span>0 views</span>
                        </div>
                    </div>
                @endfor                
            @endif
        </div>
        <!-- End Featured Videos Section -->
    </div>
@endsection
