@extends('layouts.frontend.app')

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

                        </div>
                    </div>
                </div>
                <div class="featured-title-heading-wrap">
                    <h1 class="feautured-title-heading">
                        Blog
                    </h1>
                </div>
            </div><!-- /.featured-title-inner-wrap -->
        </div><!-- /#featured-title-inner -->
    </div>
    <!-- End Featured Title -->

    <!-- Main Content -->
    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>

    <div id="main-content" class="site-main clearfix" style="margn-top:30px;">
        <div id="content-wrap" class="container">

            <div class="blogSidebar">
                <div id="site-content" class="site-content clearfix" style="flex: 0 0 70%;">
                    <div id="inner-content" class="inner-content-wrap">
                        @foreach ($blogs as $blog)
                            <article class="hentry data-effect">
                                <div style='height: 300px;'
                                    class="post-media has-effect-icon offset-v-25 offset-h-24 data-effect-item clerafix">
                                    <a href="{{route('frontend.blogs.details', $blog->slug)}}">
                                        <img src="{{asset($blog->image)}}" style="width:100%; height:100%; object-fit:cover;"
                                            alt="Image"></a>

                                    <div class="overlay-effect bg-color-1"></div>
                                    <div class="elm-link">
                                        <a href="{{route('frontend.blogs.details', $blog->slug)}}" class="icon-1"></a>
                                    </div>
                                </div>

                                <div class="post-content-wrap clearfix">
                                    <h2 class="post-title">
                                        <span class="post-title-inner">
                                            <a href="{{route('frontend.blogs.details', $blog->slug)}}">{{$blog->title}}</a>
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
                                        {!! \Illuminate\Support\Str::words(strip_tags($blog->description), 100, '...') !!}
                                    </div><!-- /.post-excerpt -->
                                    <div class="post-read-more">
                                        <div class="post-link">
                                            <a href="{{route('frontend.blogs.details', $blog->slug)}}">READ MORE</a>
                                        </div>
                                    </div>
                                </div><!-- /.post-content-wrap -->
                            </article>
                        @endforeach
                        {{-- <article class="hentry data-effect">
                            <div class="post-media has-effect-icon offset-v-25 offset-h-24 data-effect-item clerafix">
                                <a href="blogs-single.php">

                                    <img src="assets/img/news/post-1-840x385.jpg" style="width:100%;" alt="Image"></a>

                                <div class="overlay-effect bg-color-1"></div>
                                <div class="elm-link">
                                    <a href="blogs-single.php" class="icon-1"></a>
                                </div>
                            </div><!-- /.post-media -->

                            <div class="post-content-wrap clearfix">
                                <h2 class="post-title">
                                    <span class="post-title-inner">
                                        <a href="blogs-single.php">Understanding Housing in Australia: What You Need to Know
                                            Before You Build or Buy</a>
                                    </span>
                                </h2><!-- /.post-title -->
                                <div class="post-meta">
                                    <div class="post-meta-content">
                                        <div class="post-meta-content-inner">
                                            <span class="post-by-author item"><span class="inner"><a href="#">By:
                                                        Admin</a></span></span>

                                        </div>
                                    </div>
                                </div><!-- /.post-meta -->
                                <div class="post-content post-excerpt">
                                    <p>Buying or building a home is one of the biggest investments in life. Whether you’re a
                                        first-time homebuyer or planning to build your dream house, understanding the
                                        housing
                                        landscape in Australia can help you make smarter decisions.</p>
                                </div><!-- /.post-excerpt -->
                                <div class="post-read-more">
                                    <div class="post-link">
                                        <a href="blogs-single.php">READ MORE</a>
                                    </div>
                                </div>
                            </div><!-- /.post-content-wrap -->
                        </article> --}}

                    </div><!-- /#inner-content -->
                </div><!-- /#site-content -->
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
            </div><!-- /#sidebar -->
        </div><!-- /#content-wrap -->
    </div><!-- /#main-content -->
    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>

@endsection