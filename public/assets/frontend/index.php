<?php include 'includes/header.php' ?>
<!-- #site-header-wrap -->
<style>
    :root {
        --scarlet: #d9534f;
        --light-bg: #f8f8f8;
        --dark-text: #333;
        --white: #fff;
    }

    /* body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      display: flex;
      flex-wrap: wrap;
      background-color: var(--light-bg);
      color: var(--dark-text);
    } */

    /* Left pane (desktop) / bottom (mobile) */
    .calculator {
        /* flex: 1 1 300px; */
        background: var(--white);
        border-right: 2px solid #eee;
        padding: 20px;
        /* box-shadow: 0 2px 6px rgba(0,0,0,0.1); */
        position: relative;
    }

    @media (max-width: 768px) {
        .calculator {
            order: 99;
            /* width: 100%; */
            border-right: none;
            border-top: 2px solid #eee;
        }
    }

    .calculator h2 {
        /* color: var(--scarlet); */
        padding: 0px 40px;
        /* margin-bottom: 16px; */
        text-align: center;
    }

    .tabs {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .tab {
        flex: 1;
        text-align: center;
        padding: 10px;
        background: #eee;
        cursor: pointer;
        transition: all 0.3s;
    }

    .tab.active {
        background: var(--scarlet);
        color: var(--white);
        font-weight: 600;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: 500;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .toggle {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
    }

    .toggle input {
        width: 18px;
        height: 18px;
    }

    .result {
        margin-top: 20px;
        padding: 10px;
        background: #f1f1f1;
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
    }

    .calculate-btn {
        background: var(--scarlet);
        color: var(--white);
        border: none;
        padding: 10px 15px;
        width: 100%;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 15px;
        transition: 0.3s;
    }

    .calculate-btn:hover {
        background: #a93226;
    }

    /* Dedicated link styling */
    .anchor-link {
        position: absolute;
        top: -70px;
    }
</style>
<!-- Main Content -->
<div id="main-content" class="site-main clearfix">
    <div id="content-wrap">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">
                    <!-- SLIDER -->
                    <div class="rev_slider_wrapper fullwidthbanner-container">
                        <div id="rev-slider1" class="rev_slider fullwidthabanner">
                            <ul>
                                <!-- Slide 1 -->
                                <li data-transition="random">
                                <li data-transition="random">
                                    <!-- YouTube Video -->
                                    <div class="tp-caption tp-videolayer"
                                        data-ytid="39bZ2VYpM-8"
                                        data-videoattributes="version=3&amp;enablejsapi=1&amp;html5=1&amp;hd=1&amp;wmode=opaque&amp;showinfo=0&amp;ref=0;&amp;mute=1&amp;autoplay=1&amp;loop=1&amp;playlist=39bZ2VYpM-8"
                                        data-videocover="assets/img/slider/slider-bg-2.jpg"
                                        data-videowidth="100%"
                                        data-videoheight="100%"
                                        data-videoloop="loop"
                                        data-videostartat="0"
                                        data-videoendat="0"
                                        data-videovolume="0"
                                        data-videocontrols="none"
                                        data-forcecover="1"
                                        data-aspectratio="16:9"
                                        data-autoplay="true"
                                        data-autoplayonlyfirsttime="false"
                                        data-nextslideatend="false"
                                        data-enablemute="on"
                                        data-muteposition="bottomleft">
                                    </div>
                                </li>
                                </li>


                                <!-- /End Slide 1 -->

                                <!-- Slide 2 -->



                                <!-- Slide 3 -->

                                <!-- /End Slide 3 -->
                            </ul>
                        </div>
                    </div>
                    <!-- END SLIDER -->
                    <!-- ABOUT -->
                    <div class="row-about">
                        <div class="container-fluid">
                            <div class="row equalize sm-equalize-auto">
                                <div class="col-md-6 half-background style-1">

                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 bg-light-grey">
                                    <div class="themesflat-spacer clearfix" data-desktop="64" data-mobile="60" data-smobile="60"></div>
                                    <div class="themesflat-content-box clearfix" data-margin="0 25% 0 4.5%" data-mobilemargin="0 0 0 4.5%">
                                        <div class="themesflat-headings style-1 clearfix">
                                            <h2 class="heading">WELCOME TO Scarlet Home</h2>
                                            <div class="sep has-width w80 accent-bg margin-top-11 clearfix"></div>
                                            <p class="sub-heading margin-top-30">Scarlet Homes was formally founded on Feb 2022. With <strong>“Custom Home for Your Simplicity”.</strong> To provide effortless and peace of mind for our clients while their Dream home is coming to its shape. </p>
                                            <p class="sub-heading">Our professional and dedicated team ensures you get to decide every nook and corner of your house! Yes, its not an everyday project home, its your dream house.</p>

                                        </div>


                                        <div class="themesflat-spacer clearfix" data-desktop="42" data-mobile="35" data-smobile="35"></div>
                                        <div class="elm-button">
                                            <a href="contact.php" class="themesflat-button bg-white">GET IN TOUCH</a>
                                        </div>
                                    </div><!-- /.themesflat-content-box -->
                                    <div class="themesflat-spacer clearfix" data-desktop="75" data-mobile="60" data-smobile="60"></div>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>

                    <!-- ICONBOX -->
                    <div class="row-iconbox">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
                                    <div class="themesflat-headings style-1 text-center clearfix">
                                        <h2 class="heading">YOUR BEST CHOOSE</h2>
                                        <div class="sep has-icon width-125 clearfix">
                                            <div class="sep-icon">
                                                <span class="sep-icon-before sep-center sep-solid"></span>
                                                <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                                <span class="sep-icon-after sep-center sep-solid"></span>
                                            </div>
                                        </div>
                                        <p class="sub-heading">Backed by a team of licensed professionals and a reputation built on integrity.</p>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="42" data-mobile="35" data-smobile="35"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="themesflat-content-box clearfix" data-margin="0 5px 0 5px" data-mobilemargin="0 0 0 0">
                                        <div class="themesflat-icon-box icon-top align-center has-width w95 circle light-bg accent-color style-1 clearfix">
                                            <div class="icon-wrap">
                                                <i class="autora-icon-quality"></i>
                                            </div>
                                            <div class="text-wrap">
                                                <h5 class="heading">BEST QUALITY</h5>
                                                <div class="sep clearfix"></div>
                                                <p class="sub-heading">Building with care, precision, and pride to ensure enduring quality you can trust.</p>
                                            </div>
                                        </div><!-- /.themesflat-icon-box -->
                                    </div><!-- /.themesflat-content-box -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-4">
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                                    <div class="themesflat-content-box clearfix" data-margin="0 5px 0 5px" data-mobilemargin="0 0 0 0">
                                        <div class="themesflat-icon-box icon-top align-center has-width w95 circle light-bg accent-color style-1 clearfix">
                                            <div class="icon-wrap">
                                                <i class="autora-icon-time"></i>
                                            </div>
                                            <div class="text-wrap">
                                                <h5 class="heading"><a href="#">ON TIME</a></h5>
                                                <div class="sep clearfix"></div>
                                                <p class="sub-heading">From design to delivery, we uphold the highest standards of quality in every project.</p>
                                            </div>
                                        </div><!-- /.themesflat-icon-box -->
                                    </div><!-- /.themesflat-content-box -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-4">
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                                    <div class="themesflat-content-box clearfix" data-margin="0 5px 0 5px" data-mobilemargin="0 0 0 0">
                                        <div class="themesflat-icon-box icon-top align-center has-width w95 circle light-bg accent-color style-1 clearfix">
                                            <div class="icon-wrap">
                                                <i class="autora-icon-author"></i>
                                            </div>
                                            <div class="text-wrap">
                                                <h5 class="heading"><a href="#">EXPERIENCED</a></h5>
                                                <div class="sep clearfix"></div>
                                                <p class="sub-heading">As the saying goes practice makes perfect. With our years of experience you can bet on us to get the job done exactly to your specifications.</p>
                                            </div>
                                        </div><!-- /.themesflat-icon-box -->
                                    </div><!-- /.themesflat-content-box -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="41" data-mobile="35" data-smobile="35"></div>
                                    <div class="elm-button text-center">
                                        <a href="about.php" class="themesflat-button bg-accent">ABOUT US</a>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="73" data-mobile="60" data-smobile="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div>
                    <!-- END ICONBOX -->
                    <div class="row">
                        <div class="container">
                            <a id="home-price-calculator" class="anchor-link"></a>

                            <section class="calculator">
                                <h2 class="heading">HOME PRICE CALCULATOR</h2>

                                <div class="tabs">
                                    <div class="tab active" data-tab="basic">Basic</div>
                                    <div class="tab" data-tab="advanced">Advanced</div>
                                </div>

                                <!-- Basic -->
                                <div id="basic" class="tab-content active">
                                    <label for="basic-size">Size (sqft)</label>
                                    <input type="number" id="basic-size" placeholder="Enter home size">

                                    <label for="basic-type">Type</label>
                                    <select id="basic-type">
                                        <option value="standard">Standard</option>
                                        <option value="premium">Premium</option>
                                        <option value="luxury">Luxury</option>
                                    </select>

                                    <button class="calculate-btn" onclick="calculateBasic()">Calculate</button>

                                    <div class="result" id="basic-result">Estimated Price: $0</div>
                                </div>

                                <!-- Advanced -->
                                <div id="advanced" class="tab-content">
                                    <label for="adv-size">Size (sqft)</label>
                                    <input type="number" id="adv-size" placeholder="Enter home size">

                                    <label for="adv-type">Type</label>
                                    <select id="adv-type">
                                        <option value="standard">Standard</option>
                                        <option value="premium">Premium</option>
                                        <option value="luxury">Luxury</option>
                                    </select>

                                    <label for="adv-droppage">Droppage (%)</label>
                                    <input type="number" id="adv-droppage" placeholder="Enter droppage %">

                                    <label for="adv-void">Void Area (sqft)</label>
                                    <input type="number" id="adv-void" placeholder="Enter void area">

                                    <label for="adv-wall">Wall Type</label>
                                    <select id="adv-wall">
                                        <option value="brick">Brick</option>
                                        <option value="drywall">Drywall</option>
                                        <option value="hybrid">Hybrid</option>
                                    </select>

                                    <div class="toggle">
                                        <input type="checkbox" id="adv-landscape">
                                        <label for="adv-landscape">Include Landscape/Fence</label>
                                    </div>

                                    <button class="calculate-btn" onclick="calculateAdvanced()">Calculate</button>

                                    <div class="result" id="adv-result">Estimated Price: $0</div>
                                </div>
                            </section>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60" style="height:60px"></div>
                    </div>



                    <!-- END ABOUT -->

                    <!-- PROJECT -->
                    <div class="row-project parallax parallax-1 parallax-overlay">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
                                    <div class="themesflat-headings style-1 text-center clearfix">
                                        <h2 class="heading text-white">FEATURED PROJECT</h2>
                                        <div class="sep has-icon width-125 border-color-light clearfix">
                                            <div class="sep-icon">
                                                <span class="sep-icon-before sep-center sep-solid"></span>
                                                <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                                <span class="sep-icon-after sep-center sep-solid"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="30" data-mobile="35" data-smobile="35"></div>
                                    <div class="themesflat-carousel-box clearfix" data-gap="30" data-column="4" data-column2="2" data-column3="1" data-auto="false">
                                        <div class="owl-carousel owl-theme">
                                            <div class="themesflat-project style-1 data-effect  clearfix">
                                                <div class="project-item">
                                                    <div class="inner">
                                                        <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                            <img src="assets/img/project/project-1-440x280.jpg" alt="Image">
                                                            <div class="text-wrap text-center">
                                                                <h5 class="heading"><a href="#">LAKE MEADOWS APARTMENTS</a></h5>
                                                                <div class="elm-meta">
                                                                    <span><a href="#">Architecture</a></span>
                                                                    <span><a href="#">Building</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="elm-link">
                                                                <a href="#" class="icon-1 icon-search"></a>
                                                                <a href="#" class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-project style-1 data-effect clearfix">
                                                <div class="project-item">
                                                    <div class="inner">
                                                        <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                            <img src="assets/img/project/project-2-440x280.jpg" alt="Image">
                                                            <div class="text-wrap text-center">
                                                                <h5 class="heading"><a href="#">LAKE MEADOWS APARTMENTS</a></h5>
                                                                <div class="elm-meta">
                                                                    <span><a href="#">Architecture</a></span>
                                                                    <span><a href="#">Building</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="elm-link">
                                                                <a href="#" class="icon-1 icon-search"></a>
                                                                <a href="#" class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-project style-1 data-effect clearfix">
                                                <div class="project-item">
                                                    <div class="inner">
                                                        <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                            <img src="assets/img/project/project-3-440x280.jpg" alt="Image">
                                                            <div class="text-wrap text-center">
                                                                <h5 class="heading"><a href="#">LAKE MEADOWS APARTMENTS</a></h5>
                                                                <div class="elm-meta">
                                                                    <span><a href="#">Architecture</a></span>
                                                                    <span><a href="#">Building</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="elm-link">
                                                                <a href="#" class="icon-1 icon-search"></a>
                                                                <a href="#" class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-project style-1 data-effect  clearfix">
                                                <div class="project-item">
                                                    <div class="inner">
                                                        <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                            <img src="assets/img/project/project-4-440x280.jpg" alt="Image">
                                                            <div class="text-wrap text-center">
                                                                <h5 class="heading"><a href="#">LAKE MEADOWS APARTMENTS</a></h5>
                                                                <div class="elm-meta">
                                                                    <span><a href="#">Architecture</a></span>
                                                                    <span><a href="#">Building</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="elm-link">
                                                                <a href="#" class="icon-1 icon-search"></a>
                                                                <a href="#" class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-project style-1 data-effect  clearfix">
                                                <div class="project-item">
                                                    <div class="inner">
                                                        <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                            <img src="assets/img/project/project-1-440x280.jpg" alt="Image">
                                                            <div class="text-wrap text-center">
                                                                <h5 class="heading"><a href="#">LAKE MEADOWS APARTMENTS</a></h5>
                                                                <div class="elm-meta">
                                                                    <span><a href="#">Architecture</a></span>
                                                                    <span><a href="#">Building</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="elm-link">
                                                                <a href="#" class="icon-1 icon-search"></a>
                                                                <a href="#" class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-project style-1 data-effect  clearfix">
                                                <div class="project-item">
                                                    <div class="inner">
                                                        <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                            <img src="assets/img/project/project-2-440x280.jpg" alt="Image">
                                                            <div class="text-wrap text-center">
                                                                <h5 class="heading"><a href="#">LAKE MEADOWS APARTMENTS</a></h5>
                                                                <div class="elm-meta">
                                                                    <span><a href="#">Architecture</a></span>
                                                                    <span><a href="#">Building</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="elm-link">
                                                                <a href="#" class="icon-1 icon-search"></a>
                                                                <a href="#" class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-project style-1 data-effect  clearfix">
                                                <div class="project-item">
                                                    <div class="inner">
                                                        <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                            <img src="assets/img/project/project-3-440x280.jpg" alt="Image">
                                                            <div class="text-wrap text-center">
                                                                <h5 class="heading"><a href="#">LAKE MEADOWS APARTMENTS</a></h5>
                                                                <div class="elm-meta">
                                                                    <span><a href="#">Architecture</a></span>
                                                                    <span><a href="#">Building</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="elm-link">
                                                                <a href="#" class="icon-1 icon-search"></a>
                                                                <a href="#" class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-project style-1 data-effect clearfix">
                                                <div class="project-item">
                                                    <div class="inner">
                                                        <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                            <img src="assets/img/project/project-4-440x280.jpg" alt="Image">
                                                            <div class="text-wrap text-center">
                                                                <h5 class="heading"><a href="#">LAKE MEADOWS APARTMENTS</a></h5>
                                                                <div class="elm-meta">
                                                                    <span><a href="#">Architecture</a></span>
                                                                    <span><a href="#">Building</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="elm-link">
                                                                <a href="#" class="icon-1 icon-search"></a>
                                                                <a href="#" class="icon-1"></a>
                                                            </div>
                                                            <div class="overlay-effect bg-color-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.themesflat-carousel-box -->
                                    <div class="themesflat-spacer clearfix" data-desktop="41" data-mobile="35" data-smobile="35"></div>
                                    <div class="elm-button text-center">
                                        <a href="#" class="themesflat-button bg-accent">ALL PROJECTS </a>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="73" data-mobile="60" data-smobile="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                        <div class="bg-parallax-overlay overlay-black"></div>
                    </div>
                    <!-- END PROJECT -->

                    <!-- ICONBOX -->
                    <div class="row-iconbox">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="61" data-mobile="60" data-smobile="60"></div>
                                    <div class="themesflat-headings style-1 text-center clearfix">
                                        <h2 class="heading font-size-30">ALL SERVICES</h2>
                                        <div class="sep has-icon width-125 clearfix">
                                            <div class="sep-icon">
                                                <span class="sep-icon-before sep-center sep-solid"></span>
                                                <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                                <span class="sep-icon-after sep-center sep-solid"></span>
                                            </div>
                                        </div>
                                        <p class="sub-heading font-weight-400">Are you interested in finding out how we can make your project <br> a success? Please constact us.</p>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="57" data-mobile="35" data-smobile="35"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->

                            <div class="themesflat-row gutter-30 clearfix">
                                <div class="col span_1_of_4">
                                    <div class="themesflat-icon-box icon-left accent-color style-2 clearfix">
                                        <div class="icon-wrap">
                                            <i class="autora-icon-build"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="#">DESIGN-BUILD</a></h5>
                                            <p class="sub-heading">We develop and understand project expectations and then manage those needs with a design team. Innovation should happen throughout a project. </p>
                                        </div>
                                    </div><!-- /.themesflat-icon-box -->
                                    <div class="themesflat-spacer clearfix" data-desktop="62" data-mobile="35" data-smobile="35"></div>
                                    <div class="themesflat-icon-box icon-left accent-color style-2 clearfix">
                                        <div class="icon-wrap font-size-35 line-height-50">
                                            <i class="autora-icon-hat-outline"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="#">PRECONSTRUCTION SERVICES</a></h5>
                                            <p class="sub-heading margin-top-18">Autora Construction Services provides the right resources and expertise to evaluate concepts through our industry leading Preconstruction Services team.</p>
                                        </div>
                                    </div><!-- /.themesflat-icon-box -->
                                </div><!-- /.col-md-4 -->

                                <div class="col span_1_of_4">
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>
                                    <div class="themesflat-icon-box icon-left accent-color style-2 clearfix">
                                        <div class="icon-wrap">
                                            <i class="autora-icon-author-outline"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="#">CONSTRUCTION MANAGEMENT</a></h5>
                                            <p class="sub-heading">We work closely with architects and designers to understand the project, and ultimately develop a targeted solution that optimizes every stage of the build. </p>
                                        </div>
                                    </div><!-- /.themesflat-icon-box -->
                                    <div class="themesflat-spacer clearfix" data-desktop="62" data-mobile="35" data-smobile="35"></div>
                                    <div class="themesflat-icon-box icon-left accent-color style-2 clearfix">
                                        <div class="icon-wrap ">
                                            <i class="autora-icon-build-home"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="#">BUILDING ENVELOPES</a></h5>
                                            <p class="sub-heading margin-top-18">Our in-house cladding teams supply and install a diverse range of solutions to new building and building envelope upgrade projects. </p>
                                        </div>
                                    </div><!-- /.themesflat-icon-box -->
                                </div><!-- /.col-md-4 -->

                                <div class="col span_1_of_4">
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>
                                    <div class="themesflat-icon-box icon-left accent-color style-2 clearfix">
                                        <div class="icon-wrap">
                                            <i class="autora-icon-building-outline"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="#">METAL BUILDING SERVICES</a></h5>
                                            <p class="sub-heading"> In the past decade alone, we have completed more than 5 million square feet of metal building systems in Western Canada and US</p>
                                        </div>
                                    </div><!-- /.themesflat-icon-box -->
                                    <div class="themesflat-spacer clearfix" data-desktop="62" data-mobile="35" data-smobile="35"></div>
                                    <div class="themesflat-icon-box icon-left accent-color style-2 clearfix">
                                        <div class="icon-wrap font-size-35 line-height-50">
                                            <i class="autora-icon-concrete"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="#">CONCRETE STRUCTURES</a></h5>
                                            <p class="sub-heading margin-top-18">We employs a talented team of industry leading professionals capable of self-performing complex concrete work, considered on a project specific basis </p>
                                        </div>
                                    </div><!-- /.themesflat-icon-box -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="72" data-mobile="60" data-smobile="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div>
                    <!-- END ICONBOX -->

                    <!-- TESTIMONIALS -->
                    <div class="row-testimonials parallax-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
                                    <div class="themesflat-carousel-box has-arrows arrow-center arrow-circle offset-v-24 clearfix" data-gap="30" data-column="1" data-column2="1" data-column3="1" data-auto="true">
                                        <div class="owl-carousel owl-theme">
                                            <div class="themesflat-testimonials style-1 max-width-70 align-center has-width w100 circle border-solid clearfix">
                                                <div class="testimonial-item">
                                                    <div class="inner">

                                                        <blockquote class="text">
                                                            <p>“ The entire building process was smooth and stress-free. ScarletHomes guided us from planning to completion with professionalism and care. ”</p>
                                                            <div class="sep has-width w80 accent-bg clearfix"></div>
                                                            <h6 class="name">David Jhonson</h6>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div><!-- /.themesflat-testimonials -->
                                            <div class="themesflat-testimonials style-1 max-width-70 align-center has-width w100 circle border-solid clearfix">
                                                <div class="testimonial-item">
                                                    <div class="inner">

                                                        <blockquote class="text">
                                                            <p>“"We were impressed by ScarletHomes’ attention to detail and commitment to quality. Our new home turned out exactly as we envisioned”</p>
                                                            <div class="sep has-width w80 accent-bg clearfix"></div>
                                                            <h6 class="name">Jane</h6>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div><!-- /.themesflat-testimonials -->
                                            <div class="themesflat-testimonials style-1 max-width-70 align-center has-width w100 circle border-solid clearfix">
                                                <div class="testimonial-item">
                                                    <div class="inner">

                                                        <blockquote class="text">
                                                            <p>"ScarletHomes made our dream home a reality! The team was professional, transparent, and delivered exceptional quality on time. We couldn’t be happier with the results."</p>
                                                            <div class="sep has-width w80 accent-bg clearfix"></div>
                                                            <h6 class="name">Jhon Doe</h6>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div><!-- /.themesflat-testimonials -->
                                        </div>
                                    </div><!-- /.themesflat-carousel-box -->
                                    <div class="themesflat-spacer clearfix" data-desktop="68" data-mobile="60" data-smobile="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div>
                    <!-- END TESTIMONIALS -->

                    <!-- QUOTE -->
                    <div class="row-quote bg-row-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="40" data-mobile="60" data-smobile="60"></div>
                                    <div class="themesflat-quote style-1 clearfix">
                                        <div class="quote-item">
                                            <div class="inner">
                                                <div class="heading-wrap">
                                                    <h3 class="heading">START BUILDING YOUR HOME</h3>
                                                </div>
                                                <div class="button-wrap has-icon icon-left">
                                                    <a href="#" class="themesflat-button bg-white small"><span> 0434 073 827<span class="icon"><i class="autora-icon-phone-contact"></i></span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="31" data-mobile="60" data-smobile="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div>
                    <!-- END QUOTE -->
                    <!-- END PARTNER -->
                </div><!-- /.page-content -->
            </div><!-- /#inner-content -->
        </div><!-- /#site-content -->
    </div><!-- /#content-wrap -->
</div><!-- /#main-content -->
<script>
    // Tab switching
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            document.getElementById(tab.dataset.tab).classList.add('active');
        });
    });

    // Basic calculation
    function calculateBasic() {
        const size = parseFloat(document.getElementById('basic-size').value) || 0;
        const type = document.getElementById('basic-type').value;

        const rates = {
            standard: 120,
            premium: 160,
            luxury: 220
        };
        const price = size * rates[type];

        document.getElementById('basic-result').innerText = `Estimated Price: $${price.toLocaleString()}`;
    }

    // Advanced calculation
    function calculateAdvanced() {
        const size = parseFloat(document.getElementById('adv-size').value) || 0;
        const type = document.getElementById('adv-type').value;
        const droppage = parseFloat(document.getElementById('adv-droppage').value) || 0;
        const voidArea = parseFloat(document.getElementById('adv-void').value) || 0;
        const wallType = document.getElementById('adv-wall').value;
        const landscape = document.getElementById('adv-landscape').checked;

        const rates = {
            standard: 120,
            premium: 160,
            luxury: 220
        };
        const wallAdjustment = wallType === 'brick' ? 1.0 : wallType === 'drywall' ? 0.9 : 1.1;
        let price = size * rates[type] * wallAdjustment;
        price = price * (1 - droppage / 100) - (voidArea * 50);
        if (landscape) price += 5000;

        document.getElementById('adv-result').innerText = `Estimated Price: $${price.toLocaleString()}`;
    }
</script>
<!-- Footer -->
<?php include 'includes/footer.php' ?>