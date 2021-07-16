<!DOCTYPE html>
<html>
<?php
use Illuminate\Support\Facades\Auth;
$user=get_first_user();
?>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="16x16" href="/admin_assets/assets/images/favicon.png">
    <title>Site Yönetimi</title>
    <link href="/admin_assets/assets/extra-libs/prism/prism.css" rel="stylesheet">

    <link href="/admin_assets/dist/css/style.css" rel="stylesheet">
    <link href="/admin_assets/dist/css/dropzone.min.css" rel="stylesheet">
    <link href="/admin_assets/dist/css/custom.css" rel="stylesheet">
    <link href="/admin_assets/dist/css/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- This page CSS -->
    <link href="/admin_assets/assets/libs/morris.js/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="/admin_assets/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/admin_assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="/admin_assets/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin_assets/dist/css/iziToast.min.css">
    <link href="/css/sweetalert.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <![endif]-->


    @yield("css")
</head>

<body>
<div class="main-wrapper" id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Onlinesoft Yönetim Paneli</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <header class="topbar">
        <!-- ============================================================== -->
        <!-- Navbar scss in header.scss -->
        <!-- ============================================================== -->
        <nav>
            <div class="nav-wrapper">
                <!-- ============================================================== -->
                <!-- Logo you can find that scss in header.scss -->
                <!-- ============================================================== -->
                <a href="javascript:void(0)" class="brand-logo">
                        <span class="icon">
                            <img class="light-logo" src="/admin_assets/assets/images/logo.png">
                        </span>
                </a>
                <!-- ============================================================== -->
                <!-- Logo you can find that scss in header.scss -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left topbar icon scss in header.scss -->
                <!-- ============================================================== -->
                <ul class="left">
                    <li class="hide-on-med-and-down">
                        <a href="javascript: void(0);" class="nav-toggle">
                            <span class="bars bar1"></span>
                            <span class="bars bar2"></span>
                            <span class="bars bar3"></span>
                        </a>
                    </li>

                    <!-- ============================================================== -->
                    <!-- Notification icon scss in header.scss -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Comment topbar icon scss in header.scss -->
                    <!-- ============================================================== -->

                </ul>

                <!-- ============================================================== -->
                <!-- Left topbar icon scss in header.scss -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right topbar icon scss in header.scss -->
                <!-- ============================================================== -->
                <ul class="right">
                    <li>
                        <a href="/" target="_blank">
                            <i class="fa fa-home"></i>&nbsp; Siteye Git</a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- Profile icon scss in header.scss -->
                    <!-- ============================================================== -->
                    <li class="lang-dropdown"><a class="dropdown-trigger" href="javascript: void(0);" data-target="lang_dropdown"><i class="flag-icon "></i></a><ul id="lang_dropdown" class="dropdown-content" tabindex="0" style="">
                            <li tabindex="0">

                        </ul>

                    </li>
                    <li><a class="dropdown-trigger" href="javascript: void(0);" data-target="user_dropdown"><img src="{{$user->logo}} " alt="user" class="circle profile-pic"></a>
                        <ul id="user_dropdown" class="mailbox dropdown-content dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{$user->logo}} " alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{$user->name}}</h4>
                                        <p>{{$user->email}}</p>
                                        <a class="waves-effect waves-light btn-small red white-text" href="/admin">Profili Göster</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>

                            <li role="separator" class="divider"></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="/admin/logout"><i class="material-icons">power_settings_new</i> Çıkış</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right topbar icon scss in header.scss -->
                <!-- ============================================================== -->
            </div>
        </nav>
        <!-- ============================================================== -->
        <!-- Navbar scss in header.scss -->
        <!-- ============================================================== -->
    </header>
    <!-- ============================================================== -->
    <!-- Sidebar scss in sidebar.scss -->
    <!-- ============================================================== -->
    @include("Admin.Layout.sidebar")
    <!-- ============================================================== -->
    <!-- Sidebar scss in sidebar.scss -->
    <!-- ========================================================= ===== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Container fluid scss in scafholding.scss -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- ============================================================== -->
            @yield("content")
        </div>
        <!-- ============================================================== -->
        <!-- Container fluid scss in scafholding.scss -->
        <!-- ============================================================== -->


        <footer class="center-align m-b-30">Tüm Hakları Saklıdır. <a href="http://onlinesoft.net" target="_blank">onlinesoft.net</a> </footer>
    </div>
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
<script src="/admin_assets/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/admin_assets/dist/js/materialize.min.js"></script>
<script src="/admin_assets/assets/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!-- ============================================================== -->
<!-- Apps -->
<!-- ============================================================== -->
<script src="/admin_assets/dist/js/app.js"></script>
<script src="/admin_assets/dist/js/app.init.js"></script>
<script src="/admin_assets/dist/js/app-style-switcher.js"></script>
<!-- ============================================================== -->
<!-- Custom js -->
<!-- ============================================================== -->
<script src="/js/custom.js"></script>

<script src="/js/ajax.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="/admin_assets/dist/js/custom.min.js"></script>


<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<!--c3 JavaScript -->
<script src="/admin_assets/extra-libs/c3/d3.min.js"></script>
<script src="/admin_assets/assets/extra-libs/c3/c3.min.js"></script>
<script src="/admin_assets/assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="/admin_assets/dist/js/pages/dashboards/dashboard4.js"></script>
<script src="/admin_assets/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Morris JavaScript -->
<script src="/admin_assets/assets/libs/raphael/raphael.min.js"></script>
<script src="/admin_assets/assets/libs/morris.js/morris.min.js"></script>
<script src="/admin_assets/assets/extra-libs/prism/prism.js"></script>
<script src="/admin_assets/dist/js/dropzone.js"></script>
<script src="/admin_assets/dist/js/iziToast.min.js"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@yield("js")

@include("Admin.Layout.alert")

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })

</script>



</body>


</html>
