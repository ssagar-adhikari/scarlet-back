<!DOCTYPE html>

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>
        {{ $config->title }}
    </title>

    <meta name="author" content="">
    <meta name="description" content="{!! $config->meta_description !!}">
    <meta name="keywords" content="{{ $config->meta_keywords }}">
    @yield('meta')
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/style.css') }}">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/assets/css/colors/color1.css') }}" id="colors">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/assets/icon/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/frontend/assets/icon/apple-touch-icon-158-precomposed.png') }}">


</head>

<body class="header-fixed page no-sidebar header-style-2 topbar-style-2 menu-has-search">

<div id="wrapper" class="animsition">
    <div id="page" class="clearfix">
        <!-- Header Wrap -->
        <div id="site-header-wrap">
            <!-- Top Bar -->
                  <!-- Top Bar -->
            <div id="top-bar">
                <div id="top-bar-inner" class="container">
                    <div class="top-bar-inner-wrap">
                        <div class="top-bar-content">
                            <div class="inner">
                                <span class="address content">{{$config->address}}</span>
                                <span class="phone content">{{$config->phone}}</span>
                                <span class="time content">{{$config->email}}</span>
                            </div>
                        </div><!-- /.top-bar-content -->

                        <div class="top-bar-socials">
                            <div class="inner">
                                <span class="text">Follow us:</span>
                                <span class="icons">
                                    <a href="{{ $config->facebook }}"><i class="fa fa-facebook"></i></a>
                                    <a href="{{ $config->instagram }}"><i class="fa fa-instagram"></i></a>
                                    <a href="{{ $config->pinterest }}"><i class="fa fa-pinterest-p"></i></a>
                                 </span>
                            </div>
                        </div><!-- /.top-bar-socials -->
                    </div>
                </div>
            </div><!-- /#top-bar -->

            <!-- Header -->
            <header id="site-header">
                <div id="site-header-inner" class="container">
                    <div class="wrap-inner clearfix">
                        <div id="site-logo" class="clearfix">
                            <div id="site-log-inner">
                                <a href="{{route('frontend.home')}}" rel="home" class="main-logo">
                                    <img src="{{ asset($config->logo) }}" alt="logo-small" width="186" height="39" data-retina="{{ asset($config->logo) }}" data-width="186" data-height="39">
                                </a>
                            </div>
                        </div><!-- /#site-logo -->

                        <div class="mobile-button">
                            <span></span>
                        </div><!-- /.mobile-button -->

                        <nav id="main-nav" class="main-nav">
                            <ul id="menu-primary-menu" class="menu">
                                <li class="menu-item current-menu-item">
                                    <a href="{{route('frontend.home')}}">HOME</a>
                                </li>
                                    <li class="menu-item">
                                    <a href="{{route('frontend.portfolios')}}">PORTFOLIO</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('frontend.about')}}">ABOUT US </a>

                                </li>
                                <li class="menu-item">
                                    <a href="{{route('frontend.services')}}">OUR SERVICES </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('frontend.blogs')}}">BLOG</a>
                                </li>
                                 <li class="menu-item">
                                    <a href="{{route('frontend.gallery')}}">GALLERY</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('frontend.contact')}}">CONTACT</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /#main-nav -->
                    </div><!-- /.wrap-inner -->
                </div><!-- /#site-header-inner -->
            </header><!-- /#site-header -->
        </div>
