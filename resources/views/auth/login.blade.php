@extends('layouts.common')
@section('title', 'Login')
@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6 mx-4">
                <!-- Login -->
                <div class="card p-7">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="{{ route('admin.index') }}" class="app-brand-link gap-3">
                            <span class="app-brand-logo demo">
                                <span>
                                    <img src="{{ asset('admin-assets/img/logo/logo.png') }}" alt="" height="30" width="30">
                                </span>
                            </span>
                            <span class="app-brand-text demo text-heading fw-semibold">{{ env('APP_NAME') }}</span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <div class="card-body mt-1">
                        <h4 class="mb-1">Welcome to {{ env('APP_NAME') }}! 👋🏻</h4>
                        <p class="mb-5">Please sign-in to your account and start the adventure</p>

                        <form id="formAuthentication" class="mb-5" action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="form-floating form-floating-outline mb-5">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email or username" required autofocus />
                                <label for="email">Email</label>
                            </div>
                            @error('email')
                            <span class="mb-5"><strong>{{ $message }}</strong></span>                                
                            @enderror

                            <div class="mb-5">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" required />
                                            <label for="password">Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <span class="mb-5"><strong>{{ $message }}</strong></span>
                            @enderror

                            <div class="mb-5 pb-2 d-flex justify-content-between pt-2 align-items-center">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                    <label class="form-check-label" for="remember-me"> Remember Me</label>
                                </div>
                                <a href="{{ route('password.request') }}" class="float-end mb-1">
                                    <span>Forgot Password?</span>
                                </a>
                            </div>
                            <div class="mb-5">
                                <button class="btn btn-primary d-grid w-100" type="submit">login</button>
                            </div>
                        </form>

                        <p class="text-center mb-5">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Login -->
                <img src="{{ asset('admin-assets/img/illustrations/tree-3.png') }}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block" />
                <img src="{{ asset('admin-assets/img/illustrations/auth-basic-mask-light.png') }}" class="authentication-image d-none d-lg-block" height="172" alt="triangle-bg"
                    data-app-light-img="{{ asset('admin-assets/img/illustrations/auth-basic-mask-light.png') }}" data-app-dark-img="{{ asset('admin-assets/img/illustrations/auth-basic-mask-dark.png') }}" />
                <img src="{{ asset('admin-assets/img/illustrations/tree.png') }}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block" />
            </div>
        </div>
    </div>
@endsection
