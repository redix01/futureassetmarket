@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><span>Account Setting</span></div>
                    <h2 class="nk-block-title fw-normal">User Profile</h2>
                    <div class="nk-block-des">
                        <p>
                            {{ $user->name }} Profile Information
                        </p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <ul class="nk-nav nav nav-tabs">
                <li class="nav-item active current-page">
                    <a class="nav-link" href="{{ route('admin.user.show', $user->id) }}">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.userAssets', $user->id) }}">User Assets</a>
                </li>

            </ul><!-- .nk-menu -->
            <!-- NK-Block @s -->
            <div class="nk-block">

                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Personal Information</h5>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if($user->status == 0)
                               <div class="alert alert-warning">
                                <div class="alert-cta flex-wrap flex-md-nowrap">
                                    <div class="alert-text">
                                        <p>This Account has not been verified.</p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="alert alert-success">
                                <div class="alert-cta flex-wrap flex-md-nowrap">
                                    <div class="alert-text">
                                        <p>This Account is verified.</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                        <div class="nk-block-des">
{{--                            <p>Basic info, like your name and address, that you use on Nio Platform.</p>--}}
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-data data-list">
                    <div class="data-head">
                        <h6 class="overline-title">Basics</h6>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Full Name</span>
                            <span class="data-value">{{ $user->name ?? '' }}</span>
                        </div>

                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Username</span>
                            <span class="data-value">{{ $user->username ?? '' }}</span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Email</span>
                            <span class="data-value">{{ $user->email ?? '' }}</span>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Password</span>
                            <span class="data-value">{{ $user->pass ?? '' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Phone Number</span>
                            <span class="data-value text-soft">{{ $user->phone ?? '' }}</span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Telegram</span>
                            <span class="data-value text-soft">{{ $user->telegram ?? '' }}</span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Date of Birth</span>
                            <span class="data-value">{{ date('d M, Y', strtotime($user->date_of_birth)) }}</span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-head">
                        <h6 class="overline-title">Address Information</h6>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">Address 1</span>
                            <span class="data-value">{{ $user->address ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">Address 2</span>
                            <span class="data-value">{{ $user->address_2 ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">City</span>
                            <span class="data-value">{{ $user->city ?? 'Not Set' }}
                                <br>{{ $user->city ?? '' }}, {{ $user->country ?? '' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">State</span>
                            <span class="data-value">{{ $user->state ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">Country</span>
                            <span class="data-value">{{ $user->country ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-head">
                        <h6 class="overline-title">ID Verification</h6>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">ID Type</span>
                            <span class="data-value">{{ $user->id_type ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">KYC Status</span>
                            <span class="data-value">
                                @if($user->id_image_1 && $user->id_type)
                                    @if($user->status >= 1)
                                        <span class="badge bg-success">Verified</span>
                                    @else
                                        <span class="badge bg-info">Documents Submitted</span>
                                        <a href="{{ route('admin.verifyUser', $user->id) }}" class="btn btn-sm btn-success ms-2">Verify KYC</a>
                                    @endif
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="row mt-3">
                     <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">ID Image Front</h6>
                            </div>
                            <div class="card-body text-center">
                                @if($user->id_image_1_url)
                                    <img src="{{ $user->id_image_1_url }}" height="250" width="240" alt="{{ $user->name }}" class="img-fluid border rounded shadow-sm">
                                    <div class="mt-2">
                                        <a href="{{ $user->id_image_1_url }}" target="_blank" class="btn btn-sm btn-outline-primary">View Full Size</a>
                                    </div>
                                @else
                                    <div class="alert alert-warning mb-0">No front ID image uploaded</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">ID Image Back</h6>
                            </div>
                            <div class="card-body text-center">
                                @if($user->id_image_2_url)
                                    <img src="{{ $user->id_image_2_url }}" height="250" width="240" alt="{{ $user->name }}" class="img-fluid border rounded shadow-sm">
                                    <div class="mt-2">
                                        <a href="{{ $user->id_image_2_url }}" target="_blank" class="btn btn-sm btn-outline-primary">View Full Size</a>
                                    </div>
                                @else
                                    <div class="alert alert-info mb-0">No back ID image uploaded</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                </div><!-- .nk-data -->

            </div>
            <!-- NK-Block @e -->
            <!-- //  Content End -->
        </div>
    </div>

        </div>
    </div>



@endsection
