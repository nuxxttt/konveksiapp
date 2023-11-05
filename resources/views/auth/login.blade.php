<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.shared/title-meta', ['title' => 'Log In'])

    @include('layouts.shared/head-css', ['mode' => $mode ?? '', 'demo' => $demo ?? ''])
</head>

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">

                            <div class="col-lg">
                                <div class="d-flex flex-column h-100">
                                    {{--<div class="auth-brand p-4">
                                        <a href="{{ route('any', 'index') }}" class="logo-light">
                                            <img src="/images/logo.png" alt="logo" width="80%" height="22">
                                        </a>
                                         <a href="{{ route('any', 'index') }}" class="logo-dark">
                                            <img src="/images/logo-dark.png" alt="dark logo" height="22">
                                        </a>
                                    </div>--}}
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Sign In</h4>
                                        <p class="text-muted mb-3">Enter your username and password to access your account
                                        </p>

                                        <!-- form -->
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            @if (sizeof($errors) > 0)
                                                @foreach ($errors->all() as $error)
                                                    <p class="text-danger">{{ $error }}</p>
                                                @endforeach
                                            @endif

                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input class="form-control" type="name" name="name" id="username"
                                                    placeholder="Enter your username" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="checkbox-signin">
                                                    <label class="form-check-label" for="checkbox-signin">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"><i class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Log In</span> </button>
                                            </div>
{{--
                                            <div class="text-center mt-4">
                                                <p class="text-muted fs-16">Sign in with</p>
                                                <div class="d-flex gap-2 justify-content-center mt-3">
                                                    <a href="javascript: void(0);" class="btn btn-soft-primary"><i
                                                            class="ri-facebook-circle-fill"></i></a>
                                                    <a href="javascript: void(0);" class="btn btn-soft-danger"><i
                                                            class="ri-google-fill"></i></a>
                                                    <a href="javascript: void(0);" class="btn btn-soft-info"><i
                                                            class="ri-twitter-fill"></i></a>
                                                    <a href="javascript: void(0);" class="btn btn-soft-dark"><i
                                                            class="ri-github-fill"></i></a>
                                                </div>
                                            </div> --}}
                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!--<div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">Don't have an account? <a href="{{url('register')}}"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Sign up</b></a>
                    </p>
                </div>
            </div> end col -->
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <div class="col-12 text-center">
                @if(isset($settings) && $settings->title)
                <script>document.write(new Date().getFullYear())</script> © {{$settings->title}}
                @else
                <script>document.write(new Date().getFullYear())</script> © Nustra Studio
                @endif
            </div>
        </span>
    </footer>

    @include('layouts.shared/footer-scripts')

</body>

</html>
