<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>


    <section class="" style="background-color: #f1f5f7;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-xl-11" style="margin-top: 50px; margin-bottom:50px;">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body py-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <h1 class="text-center mb-5 mx-1 mx-md-4 mt-4" style="font-weight:600 ;">Sign Up
                                    </h1>

                                    <form action="{{ route('register') }}" class="mx-1 mx-md-4" method="post">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-user fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="name" type="text" name="name" required="" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-user fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="username" type="text" name="username" required="" placeholder="UserName">
                                            </div>
                                        </div>
                                       

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="email" type="email" name="email" required="" placeholder="Email">

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="password" type="password" name="password" required="" placeholder="Password">

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Password Confirmation">

                                            </div>
                                        </div>


                                        <div class="d-flex justify-content-end  mb-3 mb-lg-4">
                                            <button type="submit" name="submit" style="background-color:#993721;border:#993721;font-weight:600" class="btn btn-primary btn-lg">Register</button>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center  mb-3 mb-lg-4">
                                        <p><small>Already Have an Account? </small></p>
                                        <a href="{{ route('login') }}" style="text-decoration: none;color:#993721; padding-left:3px;"><small>
                                                Log IN
                                            </small></a>

                                    </div>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center order-1 order-lg-2" style="    justify-content: space-around;">

                                    <img src="{{ asset('backend/assets/images/a.png') }}" width="70%" height="auto" class=" img-fluid" alt="Sample image">

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
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

                    <div class="p-3">

                        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="name" type="text" name="name" required="" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="username" type="text" name="username" required="" placeholder="UserName">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="email" type="email" name="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="password" type="password" name="password" required="" placeholder="Password">
                                </div>
                            </div>


                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Password Confirmation">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group mt-2 mb-0 row">
                                <div class="col-12 mt-3 text-center">
                                    <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                                </div>
                            </div>
                        </form> -->
                        <!-- end form -->
                    <!-- </div>
                </div> -->
                <!-- end cardbody -->
            <!-- </div> -->
            <!-- end card -->
        <!-- </div> -->
        <!-- end container -->
    <!-- </div> -->
    <!-- end -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>

</html>