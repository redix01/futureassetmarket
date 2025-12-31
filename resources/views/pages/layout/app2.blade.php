<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>{{ env('APP_NAME') }}</title>

<!-- Fav Icon -->
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
<!-- Stylesheets -->
<link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/odometer.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/elpath.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/color.css') }}" id="jssDefault" rel="stylesheet">
<link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/dark.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/header.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/banner.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/clients.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/process.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/trading.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/platform.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/funfact.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/apps.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/about.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/working.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/experience.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/news.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/subscribe.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/footer.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">


</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper dark_home ltr">


        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close"><i class="fal fa-times"></i></div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="L" class="letters-loading">
                                L
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="d" class="letters-loading">
                                d
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="n" class="letters-loading">
                                n
                            </span>
                            <span data-text-preloader="g" class="letters-loading">
                                g
                            </span>
                            <span data-text-preloader="." class="letters-loading">
                                .
                            </span>
                            <span data-text-preloader="." class="letters-loading">
                                .
                            </span>
                            <span data-text-preloader="." class="letters-loading">
                                .
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->






        <!-- main header -->
        <header class="main-header header-style-four">


            <!-- header-lower -->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box">
                        <figure class="logo-box">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('img/helix.png') }}" alt="">
                            </a>
                        </figure>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                       <li class="{{ Route::is('index') ? 'current' : '' }}"><a href="{{ route('index') }}" >Home</a></li>
                                        <li class="dropdown"><a href="index.html">Trading</a>
                                            <ul>
                                                <li><a href="platform.html">Platform</a></li>
                                                <li><a href="account.html">Account</a></li>

                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="index.html">Market</a>
                                            <ul>
                                                <li><a href="markets.html">Forex</a></li>
                                                <li><a href="markets.html">Stocks</a></li>
                                                <li><a href="markets.html">Crypto</a></li>
                                                <li><a href="markets.html">Metals</a></li>
                                                <li><a href="markets.html">Indices</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="index.html">About Us</a>
                                            <ul>
                                                <li class="dropdown"><a href="index.html">Education</a>
                                                    <ul>
                                                        <li><a href="education.html">Education</a></li>
                                                        <li><a href="education-details.html">Book Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"><a href="index.html">Team</a>
                                                    <ul>
                                                        <li><a href="team.html">Our Expert Team</a></li>
                                                        <li><a href="team-details.html">Team Deatils</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="faq.html">FAQ's</a></li>
                                                <li><a href="error.html">404</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content">
                            <div class="language-picker js-language-picker mr_20" data-trigger-class="btn btn--subtle">

                            </div>
                            <div class="btn-box"><a href="{{ route('register') }}" target="_blank" class="theme-btn btn-one">Open Account</a></div>
                        </div>
                    </div>
                </div>
            </div>



            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <figure class="logo-box"><a href="{{ route('index') }}">
                                <img src="{{ asset('img/helix.png') }}" alt="">
                            </a></figure>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="menu-right-content">
                            <div class="btn-box"><a href="{{ route('register') }}" target="_blank" class="theme-btn btn-one">Open Account</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->


        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ route('index') }}"><img src="{{ asset('img/helix.png') }}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->

            @yield('content')


        <!-- main-footer -->
        <footer class="main-footer">
            <div class="widget-section p_relative pt_70 pb_80">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 big-column">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title mb_11">
                                            <h3>About Us</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="index.html">Who we are</a></li>
                                                <li><a href="index.html">Awards</a></li>
                                                <li><a href="index.html">Principals</a></li>
                                                <li><a href="index.html">Partnership</a></li>
                                                <li><a href="contact.html">Contact us</a></li>
                                                <li><a href="index.html">Careers</a></li>
                                                <li><a href="index.html">Management</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title mb_11">
                                            <h3>Platforms</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="index.html">Forex</a></li>
                                                <li><a href="index.html">Crypto CFDs</a></li>
                                                <li><a href="index.html">Share CFDs</a></li>
                                                <li><a href="index.html">Commodities</a></li>
                                                <li><a href="index.html">Spot Metals</a></li>
                                                <li><a href="index.html">Energies</a></li>
                                                <li><a href="index.html">MetaTrader 5</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title mb_11">
                                            <h3>Trading Tools</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="index.html">FXT Navigator</a></li>
                                                <li><a href="index.html">Trading Central</a></li>
                                                <li><a href="index.html">Economic Calendar</a></li>
                                                <li><a href="index.html">Market Sentiment</a></li>
                                                <li><a href="index.html">API Trading</a></li>
                                                <li><a href="index.html">VPS</a></li>
                                                <li><a href="index.html">CDF Rollover</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title mb_25">
                                            <h3>Support</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="index.html">Legal Information</a></li>
                                                <li><a href="index.html">Privacy Policy</a></li>
                                                <li><a href="index.html">Regulations</a></li>
                                                <li><a href="index.html">Risk Disclaimer</a></li>
                                                <li><a href="index.html">Complaints Procedure</a></li>
                                                <li><a href="index.html">Company News</a></li>
                                                <li><a href="index.html">Trading Videos</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-lower">
                                <figure class="footer-logo"><a href="{{ route('index') }}"><img src="{{ asset('img/helix.png') }}" alt=""></a></figure>
                                <ul class="footer-card clearfix">
                                    <li><h4>We Accept:</h4></li>
                                    <li><a href="index.html"><img src="assets/images/icons/card-1.png" alt=""></a></li>
                                    <li><a href="index.html"><img src="assets/images/icons/card-2.png" alt=""></a></li>
                                    <li><a href="index.html"><img src="assets/images/icons/card-3.png" alt=""></a></li>
                                    <li><a href="index.html"><img src="assets/images/icons/card-4.png" alt=""></a></li>
                                    <li><a href="index.html"><img src="assets/images/icons/card-5.png" alt=""></a></li>
                                    <li><a href="index.html"><img src="assets/images/icons/card-6.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget centred ml_80">
                                <div class="widget-content">
                                    <figure class="footer-logo mb_15"><a href="{{ route('index') }}"><img src="{{ asset('img/helix.png') }}" alt=""></a></figure>
                                    <p>Trade multipliers on our app.</p>
                                    <div class="scanner-box mb_30"><img src="assets/images/icons/icon-15.png" alt=""></div>
                                    <ul class="download-list clearfix">
                                        <li><a href="index.html"><i class="fab fa-apple"></i></a></li>
                                        <li><a href="index.html"><img src="assets/images/icons/icon-2.png" alt=""></a></li>
                                        <li><a href="index.html"><i class="fab fa-android"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="bottom-inner">
                        <p>Copyright &copy; 2007-2024 <a href="index.html">ForTradex</a>. All rights reserved.</p>
                        <ul class="social-links">
                            <li><h5>Follow Us On:</h5></li>
                            <li><a href="index.html"><i class="icon-12"></i></a></li>
                            <li><a href="index.html"><i class="icon-13"></i></a></li>
                            <li><a href="index.html"><i class="icon-14"></i></a></li>
                            <li><a href="index.html"><i class="icon-15"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <div class="scroll-to-top">
            <svg class="scroll-top-inner" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

    </div>


    <!-- jequery plugins -->
   <script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/validation.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>
<script src="{{ asset('assets/js/isotope.js') }}"></script>
<script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/scrolltop.min.js') }}"></script>
<script src="{{ asset('assets/js/language.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/odometer.js') }}"></script>
<script src="{{ asset('assets/js/jquery.lettering.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.circleType.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('assets/js/script.js') }}"></script>


</body><!-- End of .page_wrapper -->

<!-- Mirrored from azim.hostlin.com/Fortradex/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 21:12:01 GMT -->
</html>
