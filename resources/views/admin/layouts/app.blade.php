<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>comet dev</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.png') }}">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/morris/morris.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('admin/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>

<!-- Main Wrapper -->
@section('content')
@show

<!-- jQuery -->
<script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('admin/assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/chart.morris.js') }}"></script>

<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Custom JS -->
<script  src="{{ asset('admin/assets/js/script.js') }}"></script>
<script  src="{{ asset('admin/assets/js/custom.js') }}"></script>

</body>

</html>
