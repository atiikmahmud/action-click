@extends('layouts.common')
@section('title', 'Registration')
@section('content')
    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6 mx-4">
                <!-- Register Card -->
                <div class="card p-7">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="{{ route('admin.index') }}" class="app-brand-link gap-3">
                            <span class="app-brand-logo demo">
                                <span>
                                    <img src="{{ asset('admin-assets/img/logo/logo.png') }}" alt="" height="30"
                                        width="30">
                                </span>
                            </span>
                            <span class="app-brand-text demo text-heading fw-semibold">{{ env('APP_NAME') }}</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="card-body mt-1">
                        <h4 class="mb-1">Adventure starts here 🚀</h4>
                        <p class="mb-5">Make your app management easy and fun!</p>

                        <form id="formAuthentication" class="mb-5" action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="form-floating form-floating-outline mb-5">
                                <input type="text" class="form-control" id="username" name="name"
                                    placeholder="Enter your name" value="{{ old('name') }}" required autocomplete="name"
                                    autofocus />
                                <label for="username">Name</label>
                            </div>

                            @error('name')
                                <p class="text-danger mt-1 mb-2">{{ $message }}</p>
                            @enderror

                            <div class="form-floating form-floating-outline mb-5">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email"/>
                                <label for="email">Email</label>
                            </div>

                            @error('email')
                                <p class="text-danger mt-1 mb-2">{{ $message }}</p>
                            @enderror

                            <div class="mb-5 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" required autocomplete="new-password"/>
                                        <label for="password">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="ri-eye-off-line ri-20px"></i></span>
                                </div>
                            </div>

                            @error('password')
                                <p class="text-danger mt-1 mb-2">{{ $message }}</p>
                            @enderror

                            <div class="mb-5 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password_confirmation"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" required autocomplete="new-password" />
                                        <label for="password">Confirm Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="ri-eye-off-line ri-20px"></i></span>
                                </div>
                            </div>

                            @error('password_confirmation')
                                <p class="text-danger mt-1 mb-2">{{ $message }}</p>
                            @enderror

                            <div class="mb-5 py-2">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required/>
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100 mb-5" type="submit">Sign up</button>
                        </form>

                        <p class="text-center mb-5">
                            <span>Already have an account?</span>
                            <a href="{{ route('login') }}">
                                <span>Sign in instead</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
                <img src="{{ asset('admin-assets/img/illustrations/tree-3.png') }}" alt="auth-tree"
                    class="authentication-image-object-left d-none d-lg-block" />
                <img src="{{ asset('admin-assets/img/illustrations/auth-basic-mask-light.png') }}"
                    class="authentication-image d-none d-lg-block" height="172" alt="triangle-bg"
                    data-app-light-img="{{ asset('admin-assets/img/illustrations/auth-basic-mask-light.png') }}"
                    data-app-dark-img="{{ asset('admin-assets/img/illustrations/auth-basic-mask-dark.png') }}" />

                <img src="{{ asset('admin-assets/img/illustrations/tree.png') }}" alt="auth-tree"
                    class="authentication-image-object-right d-none d-lg-block" />
            </div>
        </div>
    </div>
@endsection
