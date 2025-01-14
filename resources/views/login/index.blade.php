@include('layouts.main')

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-3 col-lg-6 col-xl-4 offset-xl-1">
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form class="/login" method="POST">
                    @csrf
                    {{-- <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Login with</p>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-linkedin-in"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div> --}}

                    <!-- Email input -->
                    <label for="Email">Email Address</label>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="" autofocus required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <label for="password" required>Password</label>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="">
                        <label for="password" required>Password</label>
                    </div>

                    {{-- <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div> --}}

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Belum punya akun? <a href="/register"
                                class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright Ksd © 2024. All rights reserved.
        </div>
        <!-- Copyright -->

        <!-- Right -->
        <div>
            <a href="https://www.facebook.com/p/PHRI-Kalbar-100067417984550/?_rdr" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://x.com/phrikalbar" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com/phri_kalbar/" class="text-white me-4">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://id.linkedin.com/company/phrionline" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <div class="text-white mb-3 mb-md-0">
                @PHRI Provinsi Kalimantan Barat.
            </div>
        </div>
        <!-- Right -->
    </div>
</section>
