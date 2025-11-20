@extends('layouts.frontend.app')
@section('content')
    <!-- Featured Title -->
    <div id="featured-title" class="featured-title clearfix">
        <div id="featured-title-inner" class="container clearfix">
            <div class="featured-title-inner-wrap">
                <div id="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="breadcrumb-trail">
                            <a href="{{ route('frontend.home') }}" class="trail-begin">Home</a>
                            <span class="sep">|</span>
                            <span class="trail-end">Story of Scarlet Homes</span>
                        </div>
                    </div>
                </div>
                <div class="featured-title-heading-wrap">
                    <h1 class="feautured-title-heading">
                        Story of Scarlet Homes
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Featured Title -->

    <!-- Main Content -->
    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">
                        @foreach ($aboutUs as $key => $about)
                            <!-- STORY OF SCARLET HOMES -->
                            @if ($key % 2 == 0)
                                <div class="row-about" style="margin-bottom: 60px;">
                                    <div class="container-fluid">
                                        <div class="row equalize sm-equalize-auto">
                                            {{-- <div class="col-md-6 half-background style-1"></div> --}}
                                            <div class="col-md-6 style-1">

                                                <img src="{{ asset($about->image) }}"
                                                    style="object-fit:cover; object-position: center;height:100%; " />
                                            </div>
                                            <div class="col-md-6 bg-light-grey">
                                                <div class="themesflat-spacer clearfix" data-desktop="64" data-mobile="35"
                                                    data-smobile="35"></div>
                                                <div class="themesflat-content-box clearfix" data-margin="0 20% 0 4.5%"
                                                    data-mobilemargin="0 0 0 4.5%">
                                                    <div class="themesflat-headings style-1 clearfix">
                                                        <h2 class="heading">{{ $about->title }}</h2>
                                                        <div class="sep has-width w80 accent-bg margin-top-11 clearfix">
                                                        </div>
                                                    </div>

                                                    <p class="sub-heading margin-top-25">
                                                        {!! $about->description !!}
                                                    </p>
                                                </div>
                                                <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="40"
                                                    data-smobile="40"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END STORY OF SCARLET HOMES -->
                            @else
                                <!-- STORY OF BHARAT -->
                                <div class="row-about" style = "margin-bottom: 60px;">
                                    <div class="container-fluid">
                                        <div class="row equalize sm-equalize-auto">
                                            <div class="col-md-6 bg-light-grey">
                                                <div class="themesflat-spacer clearfix" data-desktop="64" data-mobile="35"
                                                    data-smobile="35"></div>
                                                <div class="themesflat-content-box clearfix" data-margin="0 20% 0 4.5%"
                                                    data-mobilemargin="0 0 0 4.5%">
                                                    <div class="themesflat-headings style-1 clearfix">
                                                        <h2 class="heading">{{ $about->title }}</h2>
                                                        <div class="sep has-width w80 accent-bg margin-top-11 clearfix">
                                                        </div>
                                                    </div>

                                                    <p class="sub-heading margin-top-25">
                                                        {!! $about->description !!}
                                                    </p>


                                                </div>
                                                <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="40"
                                                    data-smobile="40"></div>
                                            </div>
                                            <div class="col-md-6 style-1">

                                               <img src="{{ asset($about->image) }}"
                                                    style="object-fit:cover; object-position: center;height:100%; " />
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- END STORY OF BHARAT -->
                            @endif
                        @endforeach



                        <!-- QUOTE -->
                        <div class="row-quote bg-row-1">
                            <div class="container">
                                <div class="themesflat-spacer clearfix" data-desktop="40" data-mobile="60"
                                    data-smobile="60"></div>
                                <div class="themesflat-quote style-1 clearfix">
                                    <div class="quote-item">
                                        <div class="inner text-center">
                                            <h3 class="heading">START BUILDING YOUR DREAM HOME WITH US</h3>
                                            <div class="button-wrap has-icon icon-left margin-top-20">
                                                <a href="contact.php" class="themesflat-button bg-white small">
                                                    <span>0434 073 827<span class="icon"><i
                                                                class="autora-icon-phone-contact"></i></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="themesflat-spacer clearfix" data-desktop="31" data-mobile="60"
                                    data-smobile="60"></div>
                            </div>
                        </div>
                        <!-- END QUOTE -->

                    </div><!-- /.page-content -->
                </div><!-- /#inner-content -->
            </div><!-- /#site-content -->
        </div><!-- /#content-wrap -->
    </div><!-- /#main-content -->
@endsection
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function matchHeights() {
                const textCol = document.querySelector(".col-md-6.bg-light-grey");
                const imageCol = document.querySelector(".col-md-6.style-1");

                if (textCol && imageCol) {
                    // Reset height before recalculating
                    imageCol.style.height = "auto";

                    // Get the text column height
                    const textHeight = textCol.offsetHeight;

                    // Assign same height to image column
                    imageCol.style.height = textHeight + "px";
                }
            }

            // Run on load
            matchHeights();

            // Run again when window resizes
            window.addEventListener("resize", matchHeights);
        });
    </script>
@endsection
