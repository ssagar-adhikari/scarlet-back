<?php include 'includes/header.php'; ?>

<!-- Featured Title -->
<div id="featured-title" class="featured-title clearfix">
    <div id="featured-title-inner" class="container clearfix">
        <div class="featured-title-inner-wrap">
            <div id="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumb-trail">
                        <a href="index.php" class="trail-begin">Home</a>
                        <span class="sep">|</span>
                        <span class="trail-end">Gallery</span>
                    </div>
                </div>
            </div>
            <div class="featured-title-heading-wrap">
                <h1 class="feautured-title-heading">Our Work Gallery</h1>
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

                                    <div class="themesflat-spacer clearfix" data-desktop="30" data-mobile="20" data-smobile="20"></div>


                                        <div class="themesflat-gallery gallery-grid" id="company-gallery">
                                            <div class="gallery-card">
                                                <img src="assets/img/gallery/a.jpg" alt="Work A" data-full="assets/img/gallery/a.jpg">
                                            </div>
                                            <div class="gallery-card">
                                                <img src="assets/img/gallery/b.jpg" alt="Work B" data-full="assets/img/gallery/b.jpg">
                                            </div>
                                            <div class="gallery-card">
                                                <img src="assets/img/gallery/c.jpg" alt="Work C" data-full="assets/img/gallery/c.jpg">
                                            </div>
                                            <div class="gallery-card">
                                                <img src="assets/img/gallery/d.jpg" alt="Work D" data-full="assets/img/gallery/d.jpg">
                                            </div>
                                            <div class="gallery-card">
                                                <img src="assets/img/gallery/e.jpg" alt="Work E" data-full="assets/img/gallery/e.jpg">
                                            </div>
                                            <div class="gallery-card">
                                                <img src="assets/img/gallery/f.jpg" alt="Work F" data-full="assets/img/gallery/f.jpg">
                                            </div>
                                        </div>


                                    <!-- /.themesflat-gallery -->

                                    <div class="themesflat-spacer clearfix" data-desktop="40" data-mobile="30" data-smobile="30"></div>

                                </div>
                            </div></div></div>
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
(function(){
    // helper
    function qsAll(sel){ return Array.prototype.slice.call(document.querySelectorAll(sel)); }

    var galleryImgs = qsAll('#company-gallery .gallery-card img');
    var lb = document.getElementById('gallery-lightbox');
    var lbImg = document.getElementById('lb-image');
    var lbCaption = document.getElementById('lb-caption');
    var lbClose = document.querySelector('.lb-close');

    if(!galleryImgs.length) return;

    galleryImgs.forEach(function(img){
        img.addEventListener('click', function(e){
            var full = img.getAttribute('data-full') || img.src;
            lbImg.src = full;
            lbImg.alt = img.alt || '';
            lbCaption.textContent = (img.nextElementSibling && img.nextElementSibling.textContent) || '';
            lb.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            document.body.style.overflowX='hidden';
             document.body.style.overflowY='hidden';
        });
    });

    function closeLightbox(){
        lb.style.display = 'none';
        lbImg.src = '';
        document.body.style.overflow = '';
    }

    lbClose.addEventListener('click', closeLightbox);

    lb.addEventListener('click', function(e){
        if(e.target === lb || e.target === lbImg.parentNode){ closeLightbox(); }
    });


})();
</script>

<?php include 'includes/footer.php'; ?>
