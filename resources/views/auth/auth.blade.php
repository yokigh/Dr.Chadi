<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Xoric - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="bg-primary bg-pattern">
    <div class="home-btn d-none d-sm-block">
        <a href="/"><i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <a href="/" class="logo"><img src="{{ asset('admin/assets/images/logo-light.png') }}" height="24" alt="logo"></a>
                    <h5 class="font-size-16 text-white-50 mb-4">Responsive Bootstrap 4 Admin Dashboard</h5>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-5 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Sign in to continue to Xoric.</h5>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group form-group-custom mb-4">
                                        <input type="email" name="email" class="form-control" id="email" required value="{{ old('email') }}">
                                        <label for="email">Email</label>
                                    </div>

                                    <div class="form-group form-group-custom mb-4">
                                        <input type="password" name="password" class="form-control" id="password" required>
                                        <label for="password">Password</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                                <label class="custom-control-label" for="remember">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right mt-3 mt-md-0">
                                            <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success d-block w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="#" class="text-muted"><i class="mdi mdi-account-circle me-1"></i> Create an account</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- card -->
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{url('https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js')}}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>

</html>
