@extends('pages.layout.app')
@section('content')

        <!-- page-title -->
        <section class="page-title centred pt_90 pb_0">
            <div class="pattern-layer rotate-me" style="background-image: url(assets/images/shape/shape-34.png);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>About Us</h1>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- about-style-three -->
        <section class="about-style-three pt_90 pb_100">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_seven">
                            <div class="content-box">
                                <div class="sec-title pb_50">
                                    <h2>{{ env('APP_NAME') }}</h2>
                                </div>
                                <ul class="accordion-box">
                                    <li class="accordion block active-block">
                                        <div class="acc-btn active">
                                            <div class="icon-box"><i class="icon-29"></i></div>
                                            <h3>Who we are</h3>
                                        </div>
                                        <div class="acc-content current">
                                            <div class="content">
                                               <p>At {{ env('APP_NAME') }}, we know what it’s like to trade. With the scale of a global fintech and the agility of a start-up, we’re here to arm you with everything you need to take on the global markets with confidence.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="icon-box"><i class="icon-29"></i></div>
                                            <h3>History</h3>
                                        </div>
                                        <div class="acc-content">
                                            <div class="content">
                                                <p>
                                                    {{ env('APP_NAME') }} was founded in 2010 in Melbourne, Australia by a team of experienced traders with a shared commitment to improve the world of online trading. Frustrated by delayed executions, expensive prices and poor customer support, we set out to provide traders around the world with superior technology, low-cost spreads and a genuine commitment to helping them master the trade.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="icon-box"><i class="icon-29"></i></div>
                                            <h3>How it works</h3>
                                        </div>
                                        <div class="acc-content">
                                            <div class="content">
                                                <p>Facilitating international payments and foreign exchange transactions, issuing credit cards, and more.</p>
                                                <a href="faq.html">Learn More</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 video-column">
                        <div class="video_block_one">
                            <div class="video-box z_1 p_relative ml_50 centred">
                                <figure class="image-box"><img src="{{ asset('img2/banner.png') }}" alt=""></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-three end -->



        <!-- cta-section -->
        <section class="cta-section">
            <div class="auto-container">
                <div  class="inner-container">
                    <div class="shape" style="background-image: url(assets/images/shape/shape-16.png); "></div>
                    <div style="margin: 20px; padding-top: 10px; text-align: center" class="icon-box"><img src="assets/images/icons/coin-1.png" alt=""></div>
                    <h2  class="text-center text-white mb-4"><span>Power Your Trades with Confidence and Control</span></h2>
                </div>
            </div>
        </section>
        <!-- cta-section end -->


        <!-- account-style-three -->
        <section class="account-style-three pt_100 pb_70">
            <div class="auto-container">
                <div class="row align-items-center">
                     <h4 class="text-center">Built for Every Type of Trader</h4>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-content">

                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 account-block">
                                    <div class="account-block-one pb_1 wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-01"></i></div>
                                            <h3><a href="{{ route('register') }}">Standard Account</a></h3>
                                            <p>
                                                Perfect for individuals looking to trade with competitive spreads and straightforward conditions. This account offers access to core market features and tools to help you grow steadily in your trading journey.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="account-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-03"></i></div>
                                            <h3><a href="{{ route('register') }}">Smart Portfolio Account</a></h3>
                                            <p>Designed for investors who want a broader view of their trading activity. Manage multiple strategies under one roof, track performance, and streamline your experience through a unified dashboard.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 account-block pt_75">
                                    <div class="account-block-one pb_1 wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-02"></i></div>
                                            <h3><a href="{{ route('register') }}">Practice Account</a></h3>
                                            <p>
                                                New to trading? Test the waters with a risk-free demo account. Learn how the market moves, try new strategies, and build confidence before going live — all with simulated funds.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="account-block-one wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-04"></i></div>
                                            <h3><a href="{{ route('register') }}">Ethical Account</a></h3>
                                            <p>
Trade in line with values. Our ethical account is structured to respect religious and moral principles by excluding interest-based and restricted financial instruments.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_eight">
                            <div class="content-box ml_60">
                                <div class="sec-title pb_20">
                                    <h2>Global Trust. Local Presence.</h2>
                                </div>
                                <div class="text-box">
                                    <p>
                                        We serve traders from around the world, backed by transparency, security, and years of industry experience. Whether you're trading full-time or exploring part-time investing, we provide the structure, tools, and support to help you thrive.
                                    </p>
                                    <ul class="list-style-one mb_40 clearfix">
                                        <li>Trade anytime, from anywhere</li>
                                        <li>Manage your investments with ease</li>
                                        <li>Monitor markets with real-time data and insights</li>
                                    </ul>
                                    <a href="{{ route('login') }}" class="theme-btn btn-one">Start Trading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- account-style-three end -->




@endsection
