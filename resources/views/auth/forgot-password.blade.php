<x-guest-layout>
    <div class="section-authentication-cover">
        <div class="row g-0">
            <!-- Left Image/Illustration -->
            <div
                class="col-12 col-xl-7 col-xxl-8 auth-cover-left d-none d-xl-flex align-items-center justify-content-center">
                <div class="card bg-transparent shadow-none rounded-0 mb-0">
                    <div class="card-body">
                        <img src="{{ asset('assets/img/login-images/forgot-password-cover.svg') }}" class="img-fluid"
                            width="600" alt="Forgot Password Illustration" />
                    </div>
                </div>
            </div>

            <!-- Forgot Password Form -->
            <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right d-flex align-items-center justify-content-center">
                <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                    <div class="card-body p-sm-5">
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/img/icons/forgot-2.png') }}" width="100"
                                alt="Forgot Password Icon" />
                        </div>
                        <h4 class="mt-3 font-weight-bold text-center">Forgot Password?</h4>
                        <p class="text-muted text-center mb-4">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </p>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control mt-1" type="email" name="email"
                                    :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
                            </div>

                            <div class="d-grid mt-4">
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Email Password Reset Link') }}
                                </x-primary-button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="btn btn-light">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Login
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
