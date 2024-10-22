@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{ asset('assets/img/hero.jpg') }}">
    </div>

    <div class="container-fluid tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Privacy Policy
            </h2>
        </div>
        <div class="row tm-mb-74 tm-row-1640">
            <div class="col-lg-5 col-md-6 col-12 mb-3">
                <img src="{{ asset('assets/img/about.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-7 col-md-6 col-12">
                <div class="tm-about-img-text">
                    <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quisquam praesentium exercitationem sapiente facilis sequi vitae porro nihil sint minus officiis eum rem, eius vel earum pariatur ex reprehenderit quos labore ab doloremque dicta? Numquam vitae, iure esse nulla, id consequatur aperiam suscipit quibusdam reiciendis accusantium sequi odio minus impedit. Vitae debitis sit, porro quis alias totam laborum sunt eius!
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi id corporis hic qui eveniet. Voluptatum libero autem nulla deleniti ratione doloremque! Sed amet molestias aut odit, omnis accusamus maiores vel.    
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit accusantium inventore, maxime eligendi saepe eum, deserunt amet molestiae illum dolor aperiam facilis tempora laboriosam totam dolorum suscipit necessitatibus ad harum at. Nobis eum earum deleniti! Porro delectus dicta inventore nisi.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
