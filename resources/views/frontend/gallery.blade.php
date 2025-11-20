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
                            <span class="trail-end">Gallery</span>
                        </div>
                    </div>
                </div>
                <div class="featured-title-heading-wrap">
                    <h1 class="feautured-title-heading"> Gallery</h1>
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
                        <div class="row-gallery">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="themesflat-spacer clearfix" data-desktop="30" data-mobile="20"
                                            data-smobile="20"></div>
                                        <ul class="themesflat-filter style-1 clearfix">
                                            <li><a href="#" data-filter="*">All</a></li>
                                            @foreach ($categories as $category)
                                                <li><a href="#"
                                                        data-filter=".category-{{ $category->id }}">{{ $category->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="themesflat-spacer clearfix" data-desktop="40" data-mobile="35"
                                            data-smobile="35"></div>
                                        <div class="themesflat-gallery gallery-grid" id="company-gallery">
                                            @foreach ($gallery as $g)
                                                <div class="gallery-card category-{{ $g->gallery_category_id }}">
                                                    <img src="{{ asset($g->image) }}" alt="scarlet-gallery"
                                                        data-full="{{ asset($g->image) }}">
                                                </div>
                                            @endforeach
                                        </div>


                                        <!-- /.themesflat-gallery -->

                                        <div class="themesflat-spacer clearfix" data-desktop="40" data-mobile="30"
                                            data-smobile="30"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LIGHTBOX (kept BEFORE footer include to avoid layout problems) -->
    <div id="gallery-lightbox" role="dialog" aria-hidden="true">
        <div class="lb-inner">
            <button class="lb-close" aria-label="Close lightbox">&times;</button>
            <div style="text-align:center;">
                <img id="lb-image" src="" alt="Large view">
                <div id="lb-caption" class="lb-caption"></div>
            </div>
        </div>
    </div>

    <!-- GALLERY SCRIPT (also before footer) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const filterLinks = document.querySelectorAll('.themesflat-filter a');
            const items = document.querySelectorAll('#company-gallery .gallery-card');

            filterLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const filter = this.getAttribute('data-filter');

                    // remove active class
                    filterLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    items.forEach(item => {
                        if (filter === '*') {
                            item.style.display = 'block';
                        } else {
                            if (item.classList.contains(filter.substring(1))) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        }
                    });
                });
            });

        });
        (function() {
            // helper
            function qsAll(sel) {
                return Array.prototype.slice.call(document.querySelectorAll(sel));
            }

            var galleryImgs = qsAll('#company-gallery .gallery-card img');
            var lb = document.getElementById('gallery-lightbox');
            var lbImg = document.getElementById('lb-image');
            var lbCaption = document.getElementById('lb-caption');
            var lbClose = document.querySelector('.lb-close');

            if (!galleryImgs.length) return;

            galleryImgs.forEach(function(img) {
                img.addEventListener('click', function(e) {
                    var full = img.getAttribute('data-full') || img.src;
                    lbImg.src = full;
                    lbImg.alt = img.alt || '';
                    lbCaption.textContent = (img.nextElementSibling && img.nextElementSibling
                        .textContent) || '';
                    lb.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                    document.body.style.overflowX = 'hidden';
                });
            });

            function closeLightbox() {
                lb.style.display = 'none';
                lbImg.src = '';
                document.body.style.overflow = '';
            }

            lbClose.addEventListener('click', closeLightbox);

            lb.addEventListener('click', function(e) {
                if (e.target === lb || e.target === lbImg.parentNode) {
                    closeLightbox();
                }
            });


        })();
    </script>
@endsection
