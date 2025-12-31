<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from azim.hostlin.com/Fortradex/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 21:12:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
          rel="stylesheet">

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
    <link href="{{ asset('assets/css/module-css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/banner.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/clients.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/account.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/funfact.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/trading.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/process.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/award.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/apps.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/news.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/subscribe.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/module-css/process.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/trading.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/platform.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/funfact.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/apps.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/working.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/module-css/experience.css') }}" rel="stylesheet">


    <script src="//code.jivosite.com/widget/f0rFliFRDE" async></script>

</head>


<!-- page wrapper -->
<body>

<div class="boxed_wrapper ltr">


    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close"><i class="fal fa-times"></i></div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading text-center">
                        <div class="d-block">
                            <span data-text-preloader="L" class="letters-loading">L</span>
                            <span data-text-preloader="o" class="letters-loading">o</span>
                            <span data-text-preloader="a" class="letters-loading">a</span>
                            <span data-text-preloader="d" class="letters-loading">d</span>
                            <span data-text-preloader="i" class="letters-loading">i</span>
                            <span data-text-preloader="n" class="letters-loading">n</span>
                            <span data-text-preloader="g" class="letters-loading">g</span>
                            <span data-text-preloader="." class="letters-loading">.</span>
                            <span data-text-preloader="." class="letters-loading">.</span>
                            <span data-text-preloader="." class="letters-loading">.</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- main header -->
    <header class="main-header header-style-one">
        <!-- header-top -->
        <div class="header-top">
            <div class="large-container">
                <div class="top-inner">
                    {{--                        <div style="visibility: hidden" class="support-box">--}}
                    {{--                            <div class="icon-box"><i class="icon-07"></i></div>--}}
                    {{--                            <a href="tel:912345678">91 2345 678</a>--}}
                    {{--                        </div>--}}
                    <div class="option-block">

                        <a href="{{ route('register') }}" class="theme-btn btn-one mr_10">Open Account</a>
                        <a href="{{ route('login') }}" class="theme-btn btn-two">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-lower -->
        <div class="header-lower">
            <div class="large-container">
                <div class="outer-box">
                    <figure class="logo-box">
                        <a href="{{route('index')}}">
                            <img src="{{ asset('img/helix.png') }}" alt="">
                            {{--                                 <h3 style="color: black; font-weight: bolder">{{ env('APP_NAME') }}</h3>--}}
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
                                    <li class="{{ Route::is('index') ? 'current' : '' }}"><a
                                                href="{{ route('index') }}">Home</a></li>
                                    {{--                                        <li class="dropdown"><a href="index.html">Trading</a>--}}
                                    {{--                                            <ul>--}}
                                    {{--                                                <li><a href="platform.html">Platform</a></li>--}}
                                    {{--                                                <li><a href="account.html">Account</a></li>--}}

                                    {{--                                            </ul>--}}
                                    {{--                                        </li>--}}
                                    <li class="dropdown"><a href="#">Market</a>
                                        <ul>
                                            <li><a href="{{ route('forex') }}">Forex</a></li>
                                            <li><a href="{{ route('stock') }}">Stocks</a></li>
                                            <li><a href="{{ route('crypto') }}">Crypto</a></li>
                                            {{--                                                <li><a href="markets.html">Metals</a></li>--}}
                                            {{--                                                <li><a href="markets.html">Indices</a></li>--}}
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Services</a>
                                        <ul>
                                            {{--                                                <li><a href="{{ route('about') }}">Client Services</a></li>--}}
                                            <li><a href="{{ route('deposit_withdrawals') }}">Deposit & Withdrawal</a>
                                            </li>
                                            {{--                                                <li><a href="faq.html">Leverage Policy</a></li>--}}
                                            <li><a href="{{ route('trading_central') }}">Trading Central</a></li>
                                            <li><a href="{{ route('execution_policy') }}">Best Execution Policy</a></li>
                                        </ul>
                                    </li>
                                    {{--                                        <li><a href="{{ route('about') }}">About</a></li>--}}
                                    {{--                                        <li><a href="contact.html">Contact</a></li>--}}
                                </ul>

                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
        <!-- header-bottom -->

        <div class="header-bottom">
            <div class="large-container">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                                                 rel="noopener nofollow"
                                                                 target="_blank"></a></div>
                    <script type="text/javascript"
                            src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                        {
                            "symbols"
                        :
                            [
                                {
                                    "proName": "FOREXCOM:SPXUSD",
                                    "title": "S&P 500 Index"
                                },
                                {
                                    "proName": "FOREXCOM:NSXUSD",
                                    "title": "US 100 Cash CFD"
                                },
                                {
                                    "proName": "FX_IDC:EURUSD",
                                    "title": "EUR to USD"
                                },
                                {
                                    "proName": "BITSTAMP:BTCUSD",
                                    "title": "Bitcoin"
                                },
                                {
                                    "proName": "BITSTAMP:ETHUSD",
                                    "title": "Ethereum"
                                },
                                {
                                    "description": "BNB",
                                    "proName": "BINANCE:BNBUSDT"
                                },
                                {
                                    "description": "TSLA",
                                    "proName": "NASDAQ:TSLA"
                                },
                                {
                                    "description": "GBPUSD",
                                    "proName": "OANDA:GBPUSD"
                                },
                                {
                                    "description": "USD to JPY",
                                    "proName": "FX:USDJPY"
                                },
                                {
                                    "description": "NVDA",
                                    "proName": "NASDAQ:NVDA"
                                },
                                {
                                    "description": "",
                                    "proName": "NASDAQ:AAPL"
                                },
                                {
                                    "description": "",
                                    "proName": "NASDAQ:META"
                                },
                                {
                                    "description": "",
                                    "proName": "NASDAQ:MSFT"
                                }
                            ],
                                "showSymbolLogo"
                        :
                            true,
                                "isTransparent"
                        :
                            false,
                                "displayMode"
                        :
                            "adaptive",
                                "colorTheme"
                        :
                            "dark",
                                "locale"
                        :
                            "en"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="large-container">
                <div class="outer-box">
                    <figure class="logo-box">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('img/helix.png') }}" alt="">
                            {{--                                 <h3 style="color: black; font-weight: bolder">{{ env('APP_NAME') }}</h3>--}}
                        </a></figure>
                    <div class="menu-area">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                        <div class="search-btn ml_30">
                            <button class="search-toggler"><i class="icon-10"></i></button>
                        </div>
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
            <div class="nav-logo"><a href="{{ route('index') }}">
                    <img src="{{ asset('img/helix.png') }}" alt="" title="">
                </a></div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            {{--                <div class="contact-info">--}}
            {{--                    <h4>Contact Info</h4>--}}
            {{--                    <ul>--}}
            {{--                        <li>Chicago 12, Melborne City, USA</li>--}}
            {{--                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>--}}
            {{--                        <li><a href="mailto:info@example.com">info@example.com</a></li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}

        </nav>
    </div>
    <!-- End Mobile Menu -->


    @yield('content')
    <section style="background: #242424" class="experience-section my-5">
        <div class="auto-container">
            <div class="inner-container">
                <div class="shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title light pb_14">
                                <span class="sub-title mb_14">Experience</span>
                                <h2>Your Trades. Backed by Expertise.</h2>
                            </div>
                            <div class="text-box">
                                <p>
                                    We help you make smarter moves by combining technology, insights, and a seamless
                                    platform built for performance.
                                </p>
                                <a href="{{ route('user.dashboard') }}" class="theme-btn btn-one">Start Trading</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item mb_95">
                                        <h2>150+ Countries</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item mb_95">
                                        <h2>$90+ Million Invested</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <h2>15+</h2>
                                        <p>Years on the market</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <h2>FSC</h2>
                                        <p>Regulated by authorities</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                            <li><a href="{{ route('about') }}">Who we are</a></li>
                                            <li><a href="{{ route('contact') }}">Contact us</a></li>
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
                                            <li><a href="{{ route('forex') }}">Forex</a></li>
                                            <li><a href="{{ route('crypto') }}">Crypto</a></li>
                                            <li><a href="{{ route('stock') }}">Share CFDs</a></li>
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
                                            {{--                                                <li><a href="{{ route('fam_navigator') }}">FXT Navigator</a></li>--}}
                                            <li><a href="{{ route('trading_central') }}">Trading Central</a></li>
                                            <li><a href="{{ route('calendar') }}">Economic Calendar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget">
                                    <div class="widget-title mb_25">
                                        <h3>Terms & Conditions</h3>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links-list clearfix">
                                            <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                                            <li><a href="{{ route('regulation') }}">Regulations</a></li>
                                            <li><a href="{{ route('risk_disclaimer') }}">Risk Disclaimer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-lower">
                            <figure class="footer-logo">
                                <a href="index.html"><img src="{{ asset('img/helix.png') }}" alt="">
                                </a></figure>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="bottom-inner">
                    <p>Copyright &copy; {{ Date('Y') }}
                        <a href="{{ route('index') }}">{{ env('APP_NAME') }}</a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->


    <!--Scroll to top-->
    {{--        <div class="scroll-to-top">--}}
    {{--            <svg class="scroll-top-inner" viewBox="-1 -1 102 102">--}}
    {{--                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />--}}
    {{--            </svg>--}}
    {{--        </div>--}}

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

<!-- Mirrored from azim.hostlin.com/Fortradex/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 21:13:25 GMT -->
</html>
