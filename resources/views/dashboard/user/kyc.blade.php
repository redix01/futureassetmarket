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
            <div class="col-xl-12 col-xxl-12">
                <div class="mainchart px-3 px-md-4 py-3 py-lg-4 ">
                    <div class="col-lg-10 offset-lg-1">
                        @if((int) $user->status === 0)
                            <form action="{{ route('user.submitKyc') }}" method="POST" enctype="multipart/form-data">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" value="{{ auth()->user()->name ?? ''}}" readonly
                                           class="form-control">
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" value="{{ auth()->user()->email ?? '' }}" readonly
                                           class="form-control">
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}" class="form-control text-black border-dark "
                                           required>
                                </div>

                                <!-- Telegram -->
                                <div class="col-md-6">
                                    <label class="form-label">Telegram Handle</label>
                                    <input type="text" name="telegram" value="{{ old('telegram', $user->telegram ?? '') }}" class="form-control">
                                </div>

                                <!-- Country -->
                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="country" value="{{ old('country', $user->country ?? '') }}" class="form-control" required>
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" value="{{ old('city', $user->city ?? '') }}" class="form-control">
                                </div>

                                <!-- Address -->
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ old('address', $user->address ?? '') }}" class="form-control">
                                </div>

                                <!-- ID Type -->
                                <div class="col-md-6">
                                    <label class="form-label">ID Type</label>
                                    <select name="id_type" class="form-select" required>
                                        <option value="">Select ID Type</option>
                                        <option value="passport" {{ old('id_type', $user->id_type) == 'passport' ? 'selected' : '' }}>Passport</option>
                                        <option value="national_id" {{ old('id_type', $user->id_type) == 'national_id' ? 'selected' : '' }}>National ID</option>
                                        <option value="driver_license" {{ old('id_type', $user->id_type) == 'driver_license' ? 'selected' : '' }}>Driver's License</option>
                                    </select>
                                </div>

                                <!-- ID Image 1 -->
                                <div class="col-md-6">
                                    <label class="form-label">ID Image Front</label>
                                    <input type="file" name="id_image_1" class="form-control" required>
                                </div>

                                <!-- ID Image 2 -->
                                <div class="col-md-6">
                                    <label class="form-label">ID Image Back</label>
                                    <input type="file" name="id_image_2" class="form-control">
                                </div>

                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Submit KYC</button>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-{{ (int) $user->status === 2 ? 'success' : 'warning' }} mb-0">
                                <div class="d-flex flex-column gap-2">
                                    <div class="fw-semibold">{!! $user->status() !!}</div>
                                    <div>
                                        @if((int) $user->status === 2)
                                            Your account is already verified. You do not need to submit KYC again.
                                        @else
                                            Your KYC documents are under review. You cannot submit again at this stage.
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>

        @include('dashboard.layout.footer')


    </div>

@endsection
