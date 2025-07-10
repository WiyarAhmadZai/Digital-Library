<x-guest-layout>
    <div class="wrapper">
        <div class="section-authentication-cover">
            <div class="row g-0">

                <!-- Left image -->
                <div
                    class="col-xl-7 col-xxl-8 d-none d-xl-flex align-items-center justify-content-center auth-cover-left">
                    <div class="card shadow-none bg-transparent mb-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/login-images/login-cover.svg') }}"
                                class="img-fluid auth-img-cover-login" width="650" alt="Login Illustration">
                        </div>
                    </div>
                </div>

                <!-- Login form -->
                <div class="col-xl-5 col-xxl-4 align-items-center justify-content-center d-flex">
                    <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0 w-100">
                        <div class="card-body p-sm-5 w-100">
                            <div class="text-center mb-4">
                                <img src="{{ asset('assets/img/logo-icon.png') }}" width="60" alt="Logo">
                                <h5 class="mt-2">Digital Library</h5>
                                <p class="mb-0">Please log in to your account</p>
                            </div>

                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}" class="row g-3">
                                @csrf

                                <!-- Email -->
                                <div class="col-12">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email') }}" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>

                                <!-- Password -->
                                <div class="col-12">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <div class="input-group" id="togglePassword">
                                        <input type="password" id="password" name="password"
                                            class="form-control border-end-0" required>
                                        <span class="input-group-text bg-transparent cursor-pointer">
                                            <i class="bx bx-hide" id="toggleIcon"></i>
                                        </span>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                </div>

                                <!-- Remember Me -->
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="remember_me"
                                            name="remember">
                                        <label class="form-check-label"
                                            for="remember_me">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>

                                <!-- Forgot Password -->
                                <div class="col-md-6 text-end">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                                    @endif
                                </div>

                                <!-- Submit -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
                                </div>

                                <!-- Sign Up -->
                                <div class="col-12 text-center">
                                    <p class="mb-0">Don't have an account yet? <a href="{{ route('register') }}">Sign
                                            up here</a></p>
                                </div>
                            </form>

                            <!-- Divider -->
                            <div class="login-separater text-center my-4">
                                <span>OR SIGN IN WITH</span>
                                <hr />
                            </div>

                            <!-- Social -->
                            <div class="text-center">
                                <a href="#" class="btn btn-facebook me-2"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="btn btn-twitter me-2"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="btn btn-google me-2"><i class="bx bxl-google"></i></a>
                                <a href="#" class="btn btn-linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle Password JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleIcon = document.getElementById('toggleIcon');
            const passwordInput = document.getElementById('password');

            toggleIcon.addEventListener('click', function() {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                toggleIcon.classList.toggle('bx-hide', !isPassword);
                toggleIcon.classList.toggle('bx-show', isPassword);
            });
        });
    </script>
</x-guest-layout>
