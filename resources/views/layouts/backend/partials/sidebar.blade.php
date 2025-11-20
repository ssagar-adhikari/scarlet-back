@php
    $currentUrl = Request::segment(1) . '/' . Request::segment(2);
    //  dd($currentUrl);
@endphp

<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset($config->logo) }}" alt="{{ $config->title }}">

            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">




                <li class="has-sub {{ $currentUrl == 'admin/dashboard' ? 'active' : '' }}">
                    <a class="sidenav-item-link " href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="has-sub {{ $currentUrl == 'admin/order' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.order.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Order </span><span class="float-right"> <span
                                class="badge badge-success">{{ getOrderCount() ?? 0 }}</span></span>
                    </a>
                </li> --}}
                {{-- <li class="has-sub {{ $currentUrl == 'admin/reservation' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.reservation.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Reservation </span><span class="float-right"> <span
                                class="badge badge-success">{{ getReservationCount() ?? 0 }}</span></span>
                    </a>
                </li> --}}
                {{-- <li class="has-sub {{ $currentUrl == 'admin/inquiry' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.inquiry.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Inquiries </span><span class="float-right"> <span
                                class="badge badge-success"></span></span>
                    </a>
                </li> --}}

                <li class="has-sub {{ $currentUrl == 'admin/portfolio' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.portfolio.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">PortFolio </span><span class="float-right">
                    </a>
                </li>

                <li class="has-sub {{ $currentUrl == 'admin/service' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.service.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Services</span>
                    </a>
                </li>
                <li class="has-sub {{ $currentUrl == 'admin/blog' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.blog.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Blogs</span>
                    </a>
                </li>
                <li class="has-sub {{ $currentUrl == 'admin/gallery' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.gallery.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Gallery</span>
                    </a>
                </li>
                 <li class="has-sub {{ $currentUrl == 'admin/testimonial' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.testimonial.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Testimonial</span>
                    </a>
                </li>
                  <li class="has-sub {{ $currentUrl == 'admin/story' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.story.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Story</span>
                    </a>
                </li>
                  <li class="has-sub {{ $currentUrl == 'admin/inquiry' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.inquiry.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Inquiry</span>
                    </a>
                </li>
                <li class="has-sub {{ $currentUrl == 'admin/configuration' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.configuration.edit') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Site Configuration</span>
                    </a>
                </li>

                {{-- <li class="has-sub {{ $currentUrl == 'admin/user' ? 'active' : '' }} ">
                    <a class="sidenav-item-link" href="{{ route('admin.user.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </li> --}}
                <li
                    class="has-sub {{ $currentUrl == 'admin/slider' || $currentUrl == 'admin/banner' || $currentUrl == 'admin/page' || $currentUrl == 'admin/contact' || $currentUrl == 'admin/social' ? 'active expand' : '' }} ">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#dashboard"
                        aria-expanded="{{ $currentUrl == 'admin/slider' || $currentUrl == 'admin/banner' || $currentUrl == 'admin/page' || $currentUrl == 'admin/contact' || $currentUrl == 'admin/social' ? 'true' : 'false' }}"
                        aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Setting</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{ $currentUrl == 'admin/slider' || $currentUrl == 'admin/banner' || $currentUrl == 'admin/page' || $currentUrl == 'admin/contact' || $currentUrl == 'admin/social' || $currentUrl == 'admin/about' ? 'show' : '' }}"
                        id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            {{-- <li class="{{ $currentUrl == 'admin/slider' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.slider.index') }}">
                                    <span class="nav-text">Slider</span>
                                </a>
                            </li> --}}
                            {{-- <li class="{{ $currentUrl == 'admin/banner' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.banner.index') }}">
                                    <span class="nav-text">Banner</span>
                                </a>
                            </li> --}}
                            {{-- <li class="{{ $currentUrl == 'admin/page' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.page.index') }}">
                                    <span class="nav-text">Page</span>
                                </a>
                            </li> --}}
                            {{-- <li class="{{ $currentUrl == 'admin/contact' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="analytics.html">
                                    <span class="nav-text">Contact</span>
                                </a>
                            </li> --}}
                            <li class="{{ $currentUrl == 'admin/slider' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.slider.index') }}">
                                    <span class="nav-text">Slider</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == 'admin/about' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.about.edit') }}">
                                    <span class="nav-text">About Us</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == 'admin/choose' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.choose.index') }}">
                                    <span class="nav-text">Best Choose</span>
                                </a>
                            </li>
                            {{-- <li class="{{ $currentUrl == 'admin/social' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.social.index') }}">
                                    <span class="nav-text">Socail Links</span>
                                </a>
                            </li> --}}
                            {{-- <li class="{{ $currentUrl == 'admin/setting' ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('admin.setting.index') }}">
                                    <span class="nav-text">Settings</span>
                                </a>
                            </li> --}}
                        </div>
                    </ul>
                </li>

            </ul>

        </div>

        {{-- <hr class="separator" />

        <div class="sidebar-footer">
            <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                    New Orders <span class="float-right"> <span class="badge badge-success">50</span></span>
                </h6>
            </div>
        </div> --}}
    </div>
</aside>
