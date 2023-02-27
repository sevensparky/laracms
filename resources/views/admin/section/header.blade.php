<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="{{ asset("images/icons/logo.png") }}" type="image/ico"/>
    <title>پنل مدیریت</title>

    <!-- Bootstrap -->
    <link href="{{ asset('bin/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bin/bootstrap-rtl/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('bin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('bin/css/custom.min.css') }}" rel="stylesheet">

    <style>
        .profile-nav{
            height: 50px;
            width: 50px;
            border-radius: 50%;
            display: inline-block;
            /* padding: 20px; */
        }
    
        .profile-sidebar{
            height: 10rem;
            width: 10rem;
            border-radius: 50%;
            display: inline-block;
            padding: 20px;
        }
    
        .profile-page{
            height: 20rem;
            width: 20rem;
            border-radius: 50%;
            display: inline-block;
            padding: 20px;
        }
    
    
    </style> 

    @stack('styles')

</head>
<!-- /header content -->
<body class="nav-md">