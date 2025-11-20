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
                                <span class="trail-end">Services
                                 <span class="sep">|</span>
                                {{$service->title}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="featured-title-heading-wrap">
                        <h1 class="feautured-title-heading">
                            {{$service->title}}
                        </h1>
                    </div>
                </div><!-- /.featured-title-inner-wrap -->
            </div><!-- /#featured-title-inner -->
        </div>
        <!-- End Featured Title -->

        <!-- Main Content -->
        <div id="main-content" class="site-main clearfix">
            <div id="content-wrap" class="container">
                <div id="site-content" class="site-content clearfix">
                    <div id="inner-content" class="inner-content-wrap">
                        <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
                        <div class="themesflat-row equalize sm-equalize-auto clearfix">
                            <div class="span_1_of_6 bg-f7f">
                                <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
                                <div class="themesflat-content-box clearfix" data-margin="0 10px 0 43px" data-mobilemargin="0 15px 0 15px">
                                    <div class="themesflat-headings style-2 clearfix">
                                        <div class="sup-heading">SPECIAL SERVICES</div>
                                        <h2 class="heading font-size-28 line-height-39">{{$service->title}}</h2>
                                        <div class="sep has-width w80 accent-bg margin-top-20 clearfix"></div>
                                        <p class="sub-heading margin-top-33 line-height-24">{!!$service->short_description!!}</p>
                                    </div>
                                </div>
                                <div class="themesflat-spacer clearfix" data-desktop="56" data-mobile="56" data-smobile="56"></div>
                            </div>
                            <div class="span_1_of_6 half-background style-2">
                            </div>
                        </div><!-- /.themesflat-row -->
                        <div class="themesflat-spacer clearfix" data-desktop="39" data-mobile="39" data-smobile="39"></div>
                        <div class="flat-content-wrap style-2 clearfix">
                            {!!$service->description!!}
                        </div>

                        <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
                    </div><!-- /#inner-content -->
                </div><!-- /#site-content -->
                <div id="sidebar">
                    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="0" data-smobile="0"></div>
                    <div id="inner-sidebar" class="inner-content-wrap">


                        <div class="widget widget_help align-center has-shadow no-sep has-border border-solid">
                            <div class="inner">
                                <h2 class="widget-title margin-bottom-14"><span>HOW CAN WE HELP ?</span></h2>
                                <p class="text line-height-26 margin-bottom-23">
                                    Are you interested in finding out how we can make your project. Please email us.
                                </p>
                                <div class="elm-button">
                                    <a href="{{route('frontend.contact')}}" class="themesflat-button bg-accent pd30">GET IN TOUCH</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                </div><!-- /#sidebar -->
            </div><!-- /#content-wrap -->
        </div><!-- /#main-content -->

@endsection
