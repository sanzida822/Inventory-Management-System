<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>



<body class="">
    <div class="bg-overlay" style="background-color: #45b96de6;"></div>

    <section class="">
        <div class="container">

            <div class="row d-flex justify-content-center align-items-center">

                <div class="col-lg-12 col-xl-11" style="margin-top: 50px; margin-bottom:50px;">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body py-5">

                            <div class="row justify-content-center">
                                <div class="col-sm-6 d-flex align-items-center order-1 order-lg-2"
                                    style="    justify-content: space-around;">

                                    <img src="{{ asset('backend/assets/images/lo.png') }}" width="70%" height="auto"
                                        class=" img-fluid" alt="Sample image">

                                </div>

                                @if ($errors->any())
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger align-content-center">
                                    <strong>{{$error}}</strong>
                                </div>
                                @endforeach


                                @endif


                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <h1 class="text-center mb-5 mx-1 mx-md-4 mt-4" style="font-weight:550 ;">Log In</h1>

                                    <form action="{{ route('login') }}" method="post">
                                        @csrf



                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"
                                                style="color:#258337e8; margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input class="form-control" placeholder="Email" type="email"
                                                    style="padding:10px;font-size:17px ;" name="email" autofocus
                                                    required>
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 10px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"
                                                style="margin-right: 5px;color:#258337e8"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input class="form-control" placeholder="Password" type="password"
                                                    style="padding:10px" name="password" required>

                                            </div>
                                        </div>



                                        <div class="form-group mb-3 row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center"
                                            style="justify-content: space-between;margin-bottom:10px;    margin-left: 26px;">

                                            <a href="{{ route('password.request') }}" class="float-end ms-auto forgot">
                                                <small style="color:#2fa746e8;font-weight:700;font-size:15px">
                                                    forgot password?</small>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-end  mb-3 mb-lg-4" style="">
                                            <button type="submit" name="login" class="btn-lg"
                                                style="background-color:#083711e8;color:white;font-weight:600;padding:8px 18px">Log
                                                In
                                            </button>
                                        </div>


                                    </form>

                                    <!-- <div class="d-flex justify-content-center  mb-3 mb-lg-4">
                                        <p><small style="font-size:14px;font-weight:550">No Account? </small></p>
                                        <a href="{{ route('register') }}"
                                            style="text-decoration: none; padding-left:3px;"><small
                                                style="color:#2fa746e8;font-weight:600;font-size:14px"> Sign Up Here
                                            </small></a>

                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>






    <!-- <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                 <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                                </a> -->
    <!-- </div>
    </div> -->

    <!-- <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

    <div class="p-3">


        <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="username" name="username" type="text" required="" placeholder="Username">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">


                    </div>
                </div>
            </div>

            <div class="form-group mb-3 text-center row mt-3 pt-1">
                <div class="col-12">
                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                </div>
            </div>

            <div class="form-group mb-0 row mt-2">
                <div class="col-sm-7 mt-3">
                    <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                </div>
                <div class="col-sm-5 mt-3">
                    <a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                </div>
            </div>
        </form> -->
    </div>
    <!-- end -->
    </div>
    <!-- end cardbody -->
    </div>
    <!-- end card -->
    </div>
    <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
    </script>

</body>

</html>