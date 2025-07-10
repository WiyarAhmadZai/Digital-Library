<x-guest-layout>
    <div class="section-authentication-cover">
        <div class="row g-0">

            <!-- Left Image/Illustration -->
            <div class="col-xl-7 col-xxl-8 auth-cover-left d-none d-xl-flex align-items-center justify-content-center">
                <div class="card bg-transparent shadow-none rounded-0">
                    <div class="card-body">
                        <img src="{{ asset('assets/img/login-images/register-cover.svg') }}" class="img-fluid"
                            width="650" alt="Register Illustration" />
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="col-xl-5 col-xxl-4 auth-cover-right d-flex align-items-center justify-content-center">
                <div class="card m-3 shadow-none bg-transparent rounded-0 w-100">
                    <div class="card-body p-sm-5">
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/img/logo-icon.png') }}" width="60" alt="Logo" />
                            <h5 class="mt-3">Digital Library</h5>
                            <p>Please fill the below details to create your account</p>
                        </div>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}" class="row g-3">
                            @csrf

                            <!-- Name -->
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                    autofocus autocomplete="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="John Doe">
                                @error('name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="username" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="example@user.com">
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="col-12" id="show_hide_password">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password" name="password" required
                                        autocomplete="new-password"
                                        class="form-control border-end-0 @error('password') is-invalid @enderror"
                                        placeholder="Enter Password">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                                            class="bx bx-hide"></i></a>
                                </div>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-12">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    autocomplete="new-password" class="form-control" placeholder="Confirm Password">
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">I read and agree to Terms &
                                        Conditions</label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Sign up</button>
                                </div>
                            </div>

                            <!-- Already have account -->
                            <div class="col-12">
                                <div class="text-center">
                                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in
                                            here</a></p>
                                </div>
                            </div>
                        </form>
                        {{--
                        <div class="login-separater text-center my-5">
                            <span>OR SIGN UP WITH EMAIL</span>
                            <hr />
                        </div>

                        <div class="list-inline contacts-social text-center">
                            <a href="javascript:;" class="list-inline-item bg-facebook text-white border-0 rounded-3"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0 rounded-3"><i
                                    class="bx bxl-twitter"></i></a>
                            <a href="javascript:;" class="list-inline-item bg-google text-white border-0 rounded-3"><i
                                    class="bx bxl-google"></i></a>
                            <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0 rounded-3"><i
                                    class="bx bxl-linkedin"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Password show & hide js -->
    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    var input = $('#show_hide_password input');
                    var icon = $('#show_hide_password i');
                    if (input.attr("type") == "text") {
                        input.attr('type', 'password');
                        icon.addClass("bx-hide").removeClass("bx-show");
                    } else {
                        input.attr('type', 'text');
                        icon.removeClass("bx-hide").addClass("bx-show");
                    }
                });
            });
        </script>
    @endpush
</x-guest-layout>
