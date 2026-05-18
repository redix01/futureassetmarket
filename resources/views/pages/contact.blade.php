@extends('pages.layout.app')
@section('content')
    <link href="{{ asset('assets/css/module-css/contact.css') }}" rel="stylesheet">


    <section class="page-title centred pt_90 pb_0">
        <div class="pattern-layer rotate-me" style="background-image: url(assets/images/shape/shape-34.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Contact Us</h1>
                <p>
                    Have a question or require specialist assistance? Contact our dedicated customer service team who
                    are available 24/5 to assist you!
                </p>
            </div>
        </div>
    </section>

    <section class="contact-section pt_90 pb_100">
        <div class="auto-container">
            <div class="info-inner pb_25">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 info-column">
                        <div class="form-inner pb_70">
                            <form method="post" action="{{ route('contact.store') }}" id="contact-form"
                                  novalidate="novalidate">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Your Name <span>*</span></label>
                                        <input type="text" class="form-control" name="full_name" placeholder=""
                                               required=""
                                               aria-required="true">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Phone <span>*</span></label>
                                        <input type="text" class="form-control" name="phone" placeholder="" required=""
                                               aria-required="true">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Email Address <span>*</span></label>
                                        <input type="email" class="form-control" name="email" placeholder="" required=""
                                               aria-required="true">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Subject <span>*</span></label>
                                        <input type="text" class="form-control" name="subject" placeholder=""
                                               required=""
                                               aria-required="true">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Department <span>*</span></label>
                                        <select name="department" id="department" class="form-control">
                                            <option value="-">Choose your department</option>
                                            <option value="marketing">Marketing</option>
                                            <option value="support">Support</option>
                                            <option value="technical">Technical Support</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Write Message <span>*</span></label>
                                        <textarea name="message" placeholder="" cols="5" rows="5"
                                                  class="form-control"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn pt_18">
                                        <button type="submit" class="theme-btn btn-one" name="submit-form">Send
                                            Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 info-column">
                        <div class="single-info">
                            <div class="icon-box"><i class="icon-46"></i></div>
                            <h4>Email Address</h4>
                            <p><a href="mailto:support@futureassetmarket.com">support@futureassetmarket.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
