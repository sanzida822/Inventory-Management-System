<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Recover Password | Admin </title>
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

</head>

<body class="">

    <!-- <section class="" style="background-color: #7b6981;"> -->
    <div class="bg-overlay" style="background-color: #45b96de6;"></div>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-6" style="margin-top: 50px; margin-bottom:50px;">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body py-5">
                        <div class="justify-content-center">
                            <div class="order-2 order-lg-1">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    Forgot your password?<strong> No problem.</strong> Just let us know your email
                                    address and we will email you a password reset link that will allow you to choose a
                                    new one.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <h1 class="text-center mb-5 mx-1 mx-md-4 mt-4" style="font-size:17px;font-weight:600;">
                                </h1>

                                <form action="{{ route('password.email') }}" class="mx-1 mx-md-4" method="post">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center" style="margin-bottom: 22px;">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw" style="margin-right: 5px;"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="form3Example3c" name="email" id="email"
                                                style="padding:10px;font-size:19px" class="form-control form-control-lg"
                                                placeholder="Enter Email" required />
                                        </div>
                                    </div>








                                    <div class="d-flex justify-content-end  mb-3 mb-lg-4">
                                        <button type="submit" name=""
                                            style="background-color:#083711e8;;border:#993721;font-size:19px"
                                            class="btn btn-primary btn-lg">Send Email</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- </section> -->













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
    
                        <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>
    
                        <div class="p-3"> -->

    <!-- 
                            

         <form  class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
            @csrf

    <div class="alert alert-info alert-dismissible fade show" role="alert">
     Forgot your password?<strong> No problem.</strong> Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="form-group mb-3">
        <div class="col-xs-12">
            <input class="form-control"  id="email" type="email" name="email"  required="" placeholder="Email">
        </div>
    </div> -->

    <!-- <div class="form-group pb-2 text-center row mt-3">
             <div class="col-12">
             <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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