<!-- resources/views/kyc-form.blade.php -->

@extends('dashboard.layout.app')
@section('content')

    <style>
        input {
            color: #000 !important;
        }

    </style>


    <div class="container-fluid main-content px-2 px-lg-4">


        <!-- Tables -->
        <div class="row my-2 g-3 gx-lg-4 pb-3">
            <div class="col-lg-10 offset-lg-1">
                <div class="mainchart px-3 px-md-4 py-3 py-lg-4 ">
                    <div class="col-lg-10 offset-lg-1">
                       <div class="nk-content-body">
                            <div class="kyc-app wide-sm m-auto">
                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                    <div class="nk-block-head-content text-center">
                                        <h2 class="nk-block-title fw-normal">KYC Verification</h2>
                                        <div class="nk-block-des">
                                            <p>To comply with regulation each participant will have to go through identity verification (KYC/AML) to prevent fraud causes. </p>
                                        </div>
                                    </div>
                                </div><!-- nk-block-head -->
                                <div class="nk-block">
                                    <div class="mt-3">
                                        <div class="card-inner card-inner-lg">
                                            <div class="nk-kyc-app p-sm-2 text-center">
                                                <div class="nk-kyc-app-icon">
                                                    <em class="icon ni ni-files"></em>
                                                </div>
                                                <div class="nk-kyc-app-text mx-auto">
                                                    <p class="lead">You have not submitted your necessary documents to verify your identity.</p>
                                                </div>
                                                <div class="nk-kyc-app-action">
                                                    <a href="{{ route('user.kycform') }}" class="btn btn-lg btn-primary">Click here to complete your KYC</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center pt-4 mt-5">
                                        <p>If you have any question, please contact our support team <a href="https://helixpointmarkets.com" target="_blank" rel="noopener noreferrer">helixpointmarkets.com</a></p>
                                    </div>
                                </div><!-- nk-block -->
                            </div><!-- kyc-app -->
                        </div>
                    </div>


                </div>
            </div>
        </div>

        @include('dashboard.layout.footer')


    </div>

@endsection
