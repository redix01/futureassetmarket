<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="A robust and intuitive trading platform designed to empower traders and investors with advanced tools and insights.">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Register | {{ env('APP_NAME') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=3.1.1') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=3.1.1') }}">
    <style>
        .captcha-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 1rem;
        }

        .captcha-container img {
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .captcha-container input[type="text"] {
            height: 40px;
            padding: 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex: 1;
            min-width: 120px;
        }

        .captcha-container button {
            height: 40px;
            padding: 0 12px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            white-space: nowrap;
        }

        .captcha-container button:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body class="nk-body bg-white npc-general pg-auth dark-mode">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="{{ route('index') }}" class="logo-link">
                            <img src="{{ asset('img2/logo.png') }}" height="60" alt="Future Asset Market logo">
{{--                            <h3 style="font-weight: bolder">{{ env('APP_NAME') }}</h3>--}}
                        </a>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Sign-Up</h4>
                                </div>
                            </div>
                            <form action="{{ route('register') }}" method="POST">
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
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Name</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg"
                                               id="default-01" placeholder="Enter your full name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg"
                                               id="default-01" placeholder="Enter your email address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Username</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="text" name="username" value="{{ old('username') }}" class="form-control form-control-lg"
                                               id="default-01" placeholder="Enter Your username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Passcode</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                           data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password" class="form-control form-control-lg"
                                               id="password" placeholder="Enter your passcode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Confirm Passcode</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                           data-target="password2">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password_confirmation"
                                               class="form-control form-control-lg" id="password2"
                                               placeholder="Confirm your passcode">
                                    </div>
                                </div>
{{--                                <div class="captcha-container">--}}
{{--                                    <img src="{{ captcha_src() }}" id="captcha_image" alt="captcha">--}}
{{--                                    <input type="text" name="captcha" required placeholder="Enter CAPTCHA">--}}

{{--                                    <button type="button" onclick="refreshCaptcha()">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                             viewBox="0 0 24 24">--}}
{{--                                            <path fill="currentColor"--}}
{{--                                                  d="M17.65 6.35A7.96 7.96 0 0 0 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08A5.99 5.99 0 0 1 12 18c-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4z"/>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </div>--}}

{{--                                <script type="text/javascript">--}}
{{--                                    function refreshCaptcha() {--}}
{{--                                        var captchaImage = document.getElementById('captcha_image');--}}
{{--                                        captchaImage.src = '{{ captcha_src() }}' + '?' + Math.random();--}}
{{--                                    }--}}
{{--                                </script>--}}
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Sign Up</button>
                                </div>
                            </form>
                            <div class="form-note-s2 text-center pt-4">
                                Already have an account?
                                <a href="{{ route('login') }}">Sign in instead</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="nk-footer nk-auth-footer-full">
                    <div class="container wide-lg">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="nk-block-content text-center text-lg-start">
                                    <p class="text-soft">&copy; {{ Date('Y') }} {{ env('APP_NAME') }}. All Rights
                                        Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('admin/assets/js/bundle.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js?ver=3.1.1') }}"></script>
<!-- select region modal -->

</html>
