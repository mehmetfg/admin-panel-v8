
<!DOCTYPE html>
<html>


<!-- Mirrored from wrappixel.com/demos/admin-templates/materialart/html/ltr/authentication-login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Feb 2019 13:51:05 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="/admin_assets/assets/images/favicon.png">
    <title>Onlinesoft Yönetim Paneli</title>
    <link href="/admin_assets/dist/css/style.css" rel="stylesheet">
    <!-- This page CSS -->
    <link href="/admin_assets/dist/css/pages/authentication.css" rel="stylesheet">

    <link rel="stylesheet" href="/admin_assets/dist/css/iziToast.min.css">
    <!-- This page CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(/admin_assets/assets/images/big/auth-bg.jpg) no-repeat center center;">
        <div class="auth-box">
            <div id="loginform">
                <div class="logo">
                    <span class="db"><img src="/admin_assets/assets/images/logo.png" alt="logo" /></span>
                    <h5 class="font-medium m-b-20">Yönetici Paneli Girişi</h5>
                </div>
                <!-- Form -->
                <div class="row">
                    <form class="col s12" action="/admin/login" method="post">
                        @csrf

                        <!-- email -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" class="validate" required>
                                <label for="email">Kullanıcı(Email)</label>
                            </div>
                        </div>
                        <!-- pwd -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" name="password" class="validate" required>
                                <label for="password">Parola</label>
                            </div>
                        </div>
                        <!-- pwd -->
                        <div class="row m-t-5">
                            <div class="col s7">

                            </div>

                        </div>
                        <!-- pwd -->
                        <div class="row m-t-40">
                            <div class="col s12">
                                <button class="btn-large w100 blue accent-4" type="submit">Giriş</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div id="recoverform">
                <div class="logo">
                    <span class="db"><img src="/admin_assets/assets/images/logo-light-icon.png" alt="logo" /></span>
                    <h5 class="font-medium m-b-20">Recover Password</h5>
                    <span>Enter your Email and instructions will be sent to you!</span>
                </div>
                <div class="row">
                    <!-- Form -->
                    <form class="col s12" action="http://wrappixel.com/demos/admin-templates/materialart/html/ltr/index.html">
                        <!-- email -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email1" type="email" class="validate" required>
                                <label for="email1">Email</label>
                            </div>
                        </div>
                        <!-- pwd -->
                        <div class="row m-t-20">
                            <div class="col s12">
                                <button class="btn-large w100 red" type="submit" name="action">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="/admin_assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/admin_assets/dist/js/materialize.min.js"></script>
<script src="/admin_assets/dist/js/iziToast.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
    $('.tooltipped').tooltip();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $(function() {
        $(".preloader").fadeOut();
    });
</script>
@include("Admin.Layout.alert")
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/materialart/html/ltr/authentication-login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Feb 2019 13:51:06 GMT -->
</html>