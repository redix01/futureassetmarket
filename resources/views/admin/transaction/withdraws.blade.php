@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <h4 class="m-3">Withdrawal History</h4>

                                        <div class="m-3">
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
                                        @if(session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif
                                        </div>
                                        <div class="table-responsive">
                                             <table class="table table-striped">
                                                <thead>
                                                    <tr class="border-b2">
                                                        <th class="fw-bold">Date</th>
                                                        <th class="fw-bold">User</th>
                                                        <th class="fw-bold">Amount</th>
                                                        <th class="fw-bold">Payment Method</th>
                                                        <th class="fw-bold">Status</th>
                                                        <th class="fw-bold">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($withdraws as $item)
                                                        <tr class="border-b2">
                                                            <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                            <td>{{ $item->user->name ?? '' }}</td>
                                                            <td>{{ number_format($item->amount, 2) ?? '' }}</td>
                                                            <td>{{ $item->payment_method ?? '' }}</td>
                                                            <td>{!! $item->status() !!}</td>
                                                            <td>
                                                                @if($item->status == 0)
                                                              <a href="{{ route('admin.approveWithdraw', $item->id) }}" class="btn btn-sm btn-success"><em class="icon ni ni-check"></em></a>
                                                              <a href="{{ route('admin.declineWithdraw', $item->id) }}" class="btn btn-sm btn-danger"><em class="icon ni ni-cross"></em></a>
                                                              @endif
                                                              <a class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#buy-coin-{{ $item->id }}"><em class="icon ni ni-eye"></em></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        @foreach($withdraws as $item)
                                            <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin-{{ $item->id }}">
                                                <div class="modal-dialog modal-dialog-centered modal-mad" role="document">
                                                    <div class="modal-content">
                                                        <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                        <form action="{{ route('admin.approveWithdraw', $item->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body modal-body-lg">
                                                                <div class="nk-block-head nk-block-head-xs text-center">
                                                                    <h5 class="nk-block-title">Withdrawal Details</h5>
                                                                </div>
                                                                <div class="nk-block mt-3">

                                                                    <ul class="list-group">
                                                                      <li class="list-group-item active">Payment Details:</li>

                                                                      @if($item->payment_method == 'crypto')
                                                                        <li class="list-group-item">Wallet: {{ $item->wallet ?? '' }}</li>
                                                                        <li class="list-group-item">Wallet Address: {{ $item->address ?? '' }}</li>

                                                                      @elseif($item->payment_method == 'bank')
                                                                        <li class="list-group-item">Bank Name: {{ $item->bank['bank_name'] ?? '' }}</li>
                                                                        <li class="list-group-item">Account Name: {{ $item->bank['acct_name'] ?? '' }}</li>
                                                                        <li class="list-group-item">Account Number: {{ $item->bank['acct_number'] ?? '' }}</li>
                                                                        <li class="list-group-item">Routing Number: {{ $item->bank['routing_number'] ?? '' }}</li>
                                                                        <li class="list-group-item">Swift Code: {{ $item->bank['swift_code'] ?? '' }}</li>
                                                                        <li class="list-group-item">IBAN: {{ $item->bank['iban'] ?? '' }}</li>
                                                                        <li class="list-group-item">Bank Branch: {{ $item->bank['branch_address'] ?? '' }}</li>

                                                                      @else
                                                                        <li class="list-group-item">PayPal: {{ $item->paypal ?? '' }}</li>
                                                                      @endif
                                                                    </ul>


                                                                    <div class="buysell-field form-action text-center">

                                                                        <div class="pt-3">
                                                                            <a href="#" data-bs-dismiss="modal" class="link link-danger">Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
