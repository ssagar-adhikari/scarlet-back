  <footer id="footer" class="clearfix">
      <div id="footer-widgets" class="container">
          <div class="themesflat-row gutter-30">
              <div class="col span_1_of_4">
                  <div class="widget widget_text">
                      <div class="textwidget">
                          <p>
                              <img src="{{ asset($config->logo) }}" alt="Image" width="170" height="34">
                          </p>


                          <ul>
                              <li>
                                  <div class="inner">
                                      <span class="fa fa-map-marker"></span>
                                      <span class="text">{{ $config->address }} </span></span>
                                  </div>
                              </li>

                              <li>
                                  <div class="inner">
                                      <span class="fa fa-phone"></span>
                                      <span class="text">CALL US :{{ $config->phone }}</span>
                                  </div>
                              </li>

                              <li class="margin-top-7">
                                  <div class="inner">
                                      <span class=" font-size-14 fa fa-envelope"></span>
                                      <span class="text">{{ $config->email }}</span>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div><!-- /.widget_text -->
                  <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
              </div><!-- /.col -->

              <!-- <div class="col span_1_of_3" style="margin: 30px 0px 0px 0px;">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="0"></div>

                        <div class="widget widget_lastest">
                            <h2 class="widget-title"><span> NAVIGATION</span></h2>
                            <ul class="lastest-posts data-effect clearfix">
                                <li class="clearfix">

                                    <div class="text">
                                        <h3><a href="home.php">Home</a></h3>
                                        <h3><a href="portfolio.php">Portfolio</a></h3>
                                        <h3><a href="about.php">About Us</a></h3>
                                        <h3><a href="service.php">Our Services</a></h3>
                                        <h3><a href="blogs.php">Blog</a></h3>
                                        <h3><a href="contact.php">Contact Us</a></h3>



                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div> -->
              <!-- /.col -->
              <div class="col span_1_of_3" style="margin: 30px 0px 0px 0px;">
                  <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="0"></div>

                  <div class="widget widget_lastest">
                      <h2 class="widget-title"><span> PORTFOLIO</span></h2>
                      <ul class="lastest-posts data-effect clearfix">
                          <li class="clearfix">
                              <div class="text">
                                @foreach ($portfolios as $portfolio)
                                    <h3><a href="{{ route('frontend.portfolios.details',$portfolio->slug) }}">{{$portfolio->title}}</a></h3>
                                @endforeach
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>

              <div class="col span_1_of_3" style="margin: 30px 0px 0px 0px;">
                  <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="0"></div>

                  <div class="widget widget_lastest">
                      <h2 class="widget-title"><span> SERVICES</span></h2>
                      <ul class="lastest-posts data-effect clearfix">
                          <li class="clearfix">

                              <div class="text">
                                @foreach ($services as $service)
                                    <h3><a href="{{ route('frontend.services.details',$service->slug) }}">{{$service->title}}</a></h3>
                                @endforeach
                              </div>
                          </li>
                      </ul>
                  </div><!-- /.widget_lastest -->
              </div><!-- /.col -->
          </div><!-- /.themesflat-row -->
      </div><!-- /#footer-widgets -->
  </footer><!-- /#footer -->

  <!-- Bottom -->
  <div id="bottom" class="clearfix has-spacer">
      <div id="bottom-bar-inner" class="container">
          <div class="bottom-bar-inner-wrap">
              <div class="bottom-bar-content">
                  <div id="copyright" style="text-align: center;">
                      © <span class="text">{{ $config->title }} | All Rights Reserved</span>
                  </div>
              </div><!-- /.bottom-bar-content -->
              <!--
                    <div class="bottom-bar-menu">
                        <ul class="bottom-nav"> -->
              <!-- <li class="menu-item ">
                                <a href="index.php">Copyright Scarlet@2024</a>
                            </li> -->
              <!-- <li class="menu-item">
                                <a href="about.php">ABOUT US</a>
                            </li>
                              <li class="menu-item">
                                <a href="service.php">OUR SERVICES</a>
                            </li>
                            <li class="menu-item">
                                <a href="portfolio.php">PORTFOLIO</a>
                            </li>

                            <li class="menu-item ">
                                <a href="blog.php">BLOG</a>
                            </li>
                            <li class="menu-item">
                                <a href="contact.php">CONTACT</a>
                            </li> -->
              <!-- </ul>
                    </div> -->
              <!-- /.bottom-bar-menu -->
          </div><!-- /.bottom-bar-inner-wrap -->
      </div><!-- /#bottom-bar-inner -->
  </div><!-- /#bottom -->

  </div><!-- /#page -->
  </div><!-- /#wrapper -->

  <a id="scroll-top"></a>

  <!-- Javascript -->
  <script src="{{asset('assets/frontend/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/plugins.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/tether.min.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/animsition.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/countto.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/equalize.min.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/jquery.isotope.min.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/owl.carousel2.thumbs.js')}}"></script>

  <script src="{{asset('assets/frontend/assets/js/jquery.cookie.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/shortcodes.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/main.js')}}"></script>

  <!-- Revolution Slider -->
  <script src="{{asset('assets/frontend/includes/rev-slider/js/jquery.themepunch.tools.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
  <script src="{{asset('assets/frontend/assets/js/rev-slider.js')}}"></script>
  <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
  <script src="{{asset('assets/frontend/includes/rev-slider/js/extensions/revolution.extension.video.min.js')}}"></script>
  </body>

  </html>
