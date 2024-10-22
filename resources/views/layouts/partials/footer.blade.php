<footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
    <div class="container-fluid tm-container-small">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                <h3 class="tm-text-primary mb-4 tm-footer-title">About {{ env('APP_NAME') }}</h3>
                <p>Discover the captivating beauty of Bangladesh through our stunning nature photography and videography.</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                <ul class="tm-footer-links pl-0">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li><a href="{{ route('video.index') }}">Videos</a></li>
                    <li><a href="{{ route('about.index') }}">About</a></li>
                    <li><a href="{{ route('contact.index') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                    <li class="mb-2"><a href="https://facebook.com/atiikmahmud" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li class="mb-2"><a href="https://x.com/AtikMahmudTareq" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="mb-2"><a href="https://www.instagram.com/atiikmahmud" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li class="mb-2"><a href="https://pin.it/3siH1V1he" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                </ul>
                <a href="{{ route('trems.conditions') }}" class="tm-text-gray text-right d-block mb-2">Terms and Conditions</a>
                <a href="{{ route('privacy.policy') }}" class="tm-text-gray text-right d-block">Privacy Policy</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                Copyright 2024 {{ env('APP_NAME') }}. All rights reserved.
            </div>
            <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                Designed by <a href="https://atiikmahmud.github.io/" class="tm-text-gray" rel="sponsored" target="_parent">Atik Mahmud</a>
            </div>
        </div>
    </div>
</footer>
