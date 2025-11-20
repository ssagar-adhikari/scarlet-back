@extends('layouts.frontend.app')
@section('meta')
    <meta name="tite" content="{{$blog->meta_title}}">
    <meta name="description" content="{{ $blog->meta_description }}">
    <meta name="keywords" content="{{ $blog->meta_keywords }}">
@endsection

@section('content')
    <!-- Featured Title -->
    <div id="featured-title" class="featured-title clearfix">
        <div id="featured-title-inner" class="container clearfix">
            <div class="featured-title-inner-wrap">
                <div id="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="breadcrumb-trail">
                            <a href="{{route('frontend.home')}}" class="trail-begin">Home</a>
                            <span class="sep">|</span>
                            <span class="trail-end">Blog</span>
                            <span class="sep">|</span>
                            <span class="trail-end">{{$blog->title}}</span>
                        </div>
                    </div>
                </div>
                <div class="featured-title-heading-wrap">
                    <h1 class="feautured-title-heading">
                        {{$blog->title}}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Featured Title -->

    <!-- Main Content -->
    <div id="main-content" class="site-main clearfix" style="margin-top:50px;">
        <div id="content-wrap" class="container">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <article class="hentry data-effect">
                        <div class="blogSidebar">
                            <div style="flex: 0 0 70%;" style="height:400px;"
                                class="post-media has-effect-icon offset-v-25 offset-h-24 data-effect-item clerafix">
                                <a href="{{route('frontend.blogs.details', $blog->slug)}}">
                                    <img src="{{asset($blog->image)}}" style="width:100%; height:400px; object-fit:cover;"
                                        alt="Image"></a>

                                <div class="overlay-effect bg-color-1"></div>
                                <div class="elm-link">
                                    <a href="{{route('frontend.blogs.details', $blog->slug)}}" class="icon-1"></a>
                                </div>
                            </div>
                            <div id="sidebar" style="flex: 0 0 28%;align-items:flex-end;margin-left:40px;">
                                <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60">
                                </div>
                                <div id="inner-sidebar" class="inner-content-wrap">


                                    <div class="widget widget_follow">
                                        <h2 class="widget-title"><span>FOLLOW US</span></h2>
                                        <div class="follow-wrap clearfix col3 g8 ">
                                            <div class="follow-item facebook">
                                                <div class="inner">
                                                    <span class="socials">
                                                        <a href="#"><i class="fa fa-facebook"></i></a>

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="follow-item instagram">
                                                <div class="inner">
                                                    <span class="socials">
                                                        <a href="#"><i class="fa fa-instagram"></i></a>

                                                    </span>
                                                </div>
                                            </div>



                                        </div>
                                    </div><!-- /.widget_follow -->

                                    <div class="widget widget_lastest">
                                        {{-- <h2 class="widget-title"><span>RECENT POST</span></h2> --}}

                                    </div><!-- /.widget_lastest -->

                                </div>
                            </div>
                        </div>
                        <!-- /.post-media -->

                        <div class="post-content-wrap clearfix">
                            <h2 class="post-title">
                                <span class="post-title-inner">
                                    <a href="#">{{$blog->title}}</a>
                                </span>
                            </h2><!-- /.post-title -->
                            <div class="post-meta">
                                <div class="post-meta-content">
                                    <div class="post-meta-content-inner">
                                        <span class="post-by-author item"><span class="inner"><a href="#">By:
                                                    {{$blog->author_name}}</a></span></span>

                                    </div>
                                </div>
                            </div><!-- /.post-meta -->
                            <div class="post-content post-excerpt">
                                {!!$blog->description!!}
                            </div><!-- /.post-excerpt -->
                        </div><!-- /.post-content-wrap -->
                    </article><!-- /.hentry -->
                </div><!-- /#inner-content -->
            </div><!-- /#site-content -->

        </div><!-- /#content-wrap -->
    </div><!-- /#main-content -->

@endsection