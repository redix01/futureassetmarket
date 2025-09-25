@extends('dashboard.layout.app')
@section('content')

    <div class="container-fluid main-content px-2 px-lg-4">

        <!-- Tables -->
        <div class="row my-2 g-3 gx-lg-4 pb-3">
            <div class="col-12">
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

                <div class="mainchart px-3 px-md-4 py-3 py-lg-4 ">
                    <div class="activity">
                        <div class="row g-3">
                            <div style="visibility: hidden" class="col-md-6">
                                <h5 class="mb-0">Sell Orders</h5>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-lg-end gap-3 col-md-6">
                                <ul class="nav nav-pills" id="pills-tab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="{{ route('user.tradeSignal') }}" class="nav-link rounded-3 py-1"
                                           id="pills-price-tab"
                                           aria-selected="false">
                                            Trade Signal
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="{{ route('user.tradeSignalHistory') }}"
                                           class="nav-link rounded-3 py-1 active" id="pills-deep-tab">
                                            Copied History
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="recent-contact pb-2 pt-3">

                        <div class="pb-2 pt-3 price-table">

                            <div class="container ">

                                <div class="col-12 mt-5">
                                    <div class="card bg-dark p-0 overflow-hidden position-relative radius-12 h-100">

                                        <div class="card-body  p-24 pt-10">

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                                                     aria-labelledby="pills-home-tab" tabindex="0">
                                                    <div>
                                                        <div class="table-responsive">
                                                            <table class="table table-stripe">
                                                                <thead class="text-white">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>User</th>
                                                                    <th>Pair</th>
                                                                    <th>Type</th>
                                                                    <th>Entry Price</th>
                                                                    <th>Take Profit</th>
                                                                    <th>Stop Loss</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Traded At</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="text-white">
                                                                @forelse($tradeSignals as $index => $trade)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>{{ $trade->user->name ?? 'Unknown' }}</td>
                                                                        <td>{{ strtoupper(is_array($trade->signal->pair) ? implode('', $trade->signal->pair) : ($trade->signal->pair ?? 'N/A')) }}</td>
                                                                        <td>
                    <span class="badge bg-{{ $trade->signal->signal_type === 'buy' ? 'success' : 'danger' }}">
                        {{ ucfirst($trade->signal->signal_type) }}
                    </span>
                                                                        </td>
                                                                        <td>{{ number_format($trade->signal->entry_price, 2) }}</td>
                                                                        <td>{{ $trade->signal->take_profit ? number_format($trade->signal->take_profit, 2) : 'N/A' }}</td>
                                                                        <td>{{ $trade->signal->stop_loss ? number_format($trade->signal->stop_loss, 2) : 'N/A' }}</td>
                                                                        <td>{{ $trade->amount ?? 'N/A' }}</td>
                                                                        <td>
                                                                            @php
                                                                                $statusColors = [
                                                                                    0 => 'secondary', // Pending
                                                                                    1 => 'success',   // Executed
                                                                                    2 => 'danger',    // Failed
                                                                                    3 => 'warning',   // Cancelled
                                                                                ];
                                                                                $badgeColor = $statusColors[$trade->status] ?? 'dark';
                                                                            @endphp
                                                                            <span class="badge bg-{{ $badgeColor }}">
                        {{ $trade->status_text }}
                    </span>
                                                                        </td>
                                                                        <td>{{ $trade->created_at->format('Y-m-d H:i') }}</td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="10" class="text-center">No trade
                                                                            signals found.
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                                </tbody>
                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <style>
                                .text-success {
                                    color: #28a745;
                                }

                                .text-danger {
                                    color: #dc3545;
                                }
                            </style>


                        </div>


                    </div>

                </div>
            </div>
        </div>

        @include('dashboard.layout.footer')


    </div>

@endsection
