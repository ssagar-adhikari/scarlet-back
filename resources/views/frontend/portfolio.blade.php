@extends('layouts.frontend.app')
@section('content')
    <div id="featured-title" class="featured-title clearfix">
        <div id="featured-title-inner" class="container clearfix">
            <div class="featured-title-inner-wrap">
                <div id="breadcrumbs">
                    <div class="breadcrumbs-inner">
                        <div class="breadcrumb-trail">
                            <a href="{{ route('frontend.home') }}" class="trail-begin">Home</a>
                            <span class="sep">|</span>
                            <span class="trail-end">Portfolio</span>
                        </div>
                    </div>
                </div>
                <div class="featured-title-heading-wrap">
                    <h1 class="feautured-title-heading">Portfolio</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">
                        <!-- SERVICES -->
                        <div class="row-services">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="themesflat-spacer clearfix" data-desktop="73" data-mobile="60"
                                            data-smobile="60"></div>

                                        {{-- ✅ Dynamic Filter --}}
                                        <ul class="themesflat-filter style-1 clearfix">
                                            <li><a href="#" data-filter="*">All</a></li>
                                            <li><a href="#" data-filter=".running">Running Project</a></li>
                                            <li><a href="#" data-filter=".completed">Completed Project</a></li>
                                        </ul>

                                        <div class="themesflat-spacer clearfix" data-desktop="40" data-mobile="35"
                                            data-smobile="35"></div>

                                        {{-- ✅ Project Grid --}}
                                        <div
                                            class="themesflat-project style-2 isotope-project has-margin mg15 data-effect clearfix">
                                            @foreach ($portfolios as $portfolio)
                                                <div class="project-item {{ $portfolio->status }}">
                                                    <div class="inner">
                                                        <div
                                                            class="thumb data-effect-item has-effect-icon w40 offset-v-19 offset-h-49">
                                                            <img src="{{ asset($portfolio->images[0]->image_path ?? 'default.jpg') }}"
                                                                style='height:250px;obkject-fit:cover; width:100%;'
                                                                alt="{{ $portfolio->title }}">
                                                            <div class="elm-link">
                                                                <a href="{{ route('frontend.portfolios.details', $portfolio->slug) }}"
                                                                    class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                        <div class="text-wrap">
                                                            <h5 class="heading">
                                                                <a
                                                                    href="{{ route('frontend.portfolios.details', $portfolio->slug) }}">
                                                                    {{ $portfolio->title }}
                                                                </a>
                                                            </h5>
                                                            <p class="text-muted text-capitalize">{{ $portfolio->status }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="themesflat-spacer clearfix" data-desktop="72" data-mobile="60"
                                            data-smobile="60"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SERVICES -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection