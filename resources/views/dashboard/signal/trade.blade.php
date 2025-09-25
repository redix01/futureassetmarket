@extends('dashboard.layout.app')
@section('content')
    @include('dashboard.layout.alert')
    <div class="container-fluid main-content px-2 px-lg-4 ">
        <div class="row my-2 g-3 g-lg-4">
            <div class="col-12">
                <h4 class="text-center">Trade Signal</h4>
            </div>
        </div>

        <!-- Main Chart Area -->
        <div class="row my-2 g-3 gx-lg-4 exchange">
            <div class="col-xl-7 col-xxl-8">
                <div class="mainchart px-3 px-md-4 py-3 py-lg-4">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                                                     rel="noopener nofollow" target="_blank">
                            </a></div>
                        <script type="text/javascript"
                                src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js"
                                async>
                            {
                                "width"
                            :
                                "100%",
                                    "height"
                            :
                                "500",
                                    "symbol"
                            :
                                "BINANCE:{{ is_array($signal->pair) ? implode('', $signal->pair) : $signal->pair }}",
                                    "interval"
                            :
                                "D",
                                    "timezone"
                            :
                                "Etc/UTC",
                                    "theme"
                            :
                                "dark",
                                    "style"
                            :
                                "1",
                                    "locale"
                            :
                                "en",
                                    "allow_symbol_change"
                            :
                                true,
                                    "support_host"
                            :
                                "https://www.tradingview.com"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->

                </div>
            </div>
            <div class="col-xl-5 col-xxl-4">
                <div class="row gy-4">
                    <div class="col-xxl-12 col-lg-6">
                        <div style="background: #1e2734" class="card bg-drk h-100">
                            <div class="card-body p-24">
                                <span class="mb-4 text-sm text-secondary-light">Avail Balance</span>
                                <h6 class="mb-4 text-warning">${{ number_format($user->balance, 2) }}</h6>


                                <form action="{{ route('user.tradeSignalStore') }}" method="POST" class="form-validate">
                                    @csrf
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
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <h4 class="mb-3 text-white">Signal Info (Read-Only)</h4>

                                    <div class="form-group mb-3">
                                        <label class="form-label text-light">Pair</label>
                                        <input type="text" class="form-control" value="{{ is_array($signal->pair) ? implode('', $signal->pair) : $signal->pair }}" disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label text-light">Signal Type</label>
                                        <input type="text" class="form-control"
                                               value="{{ ucfirst($signal->signal_type) }}" disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label text-light">Entry Price</label>
                                        <input type="text" class="form-control"
                                               value="{{ number_format($signal->entry_price, 2) }}" disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label text-light">Take Profit</label>
                                        <input type="text" class="form-control"
                                               value="{{ $signal->take_profit ? number_format($signal->take_profit, 2) : 'N/A' }}"
                                               disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label text-light">Stop Loss</label>
                                        <input type="text" class="form-control"
                                               value="{{ $signal->stop_loss ? number_format($signal->stop_loss, 2) : 'N/A' }}"
                                               disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label text-light">Minimum Amount</label>
                                        <input type="text" class="form-control"
                                               value="{{ $signal->min_amount ?? 'N/A' }}" disabled>
                                    </div>

                                    @if($signal->notes)
                                        <div class="form-group mb-3">
                                            <label class="form-label text-light">Notes</label>
                                            <textarea class="form-control" rows="2"
                                                      disabled>{{ $signal->notes }}</textarea>
                                        </div>
                                    @endif

                                    <hr class="text-secondary">

                                    <input type="hidden" name="signal_id" value="{{ $signal->id }}">

                                    <div class="form-group mb-4">
                                        <label class="form-label text-light">Enter Trade Amount
                                            (min: {{ $signal->min_amount ?? 0 }})</label>
                                        <input type="number" step="0.001" name="trade_amount" class="form-control"
                                               min="{{ $signal->min_amount ?? 0 }}" required>
                                    </div>

                                    <div class="form-group text-end">
                                        <button type="submit" class="btn btn-success">Activate Trade</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tables -->
        <div class="row my-2 g-3 gx-lg-4 pb-3 exchange mt-5">
            <div class="col-lg-12">
                <div class="mainchart px-3 px-md-4 py-3 py-lg-4 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Order History</h5>

                    </div>
                    <div class="tab-content" id="pills-tabContent2">
                        <div class="tab-pane fade show active" id="price" role="tabpanel" tabindex="0">
                            <div class="recent-contact pb-2 pt-3">
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped table-bordered align-middle">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Pair</th>
                                            <th>Signal Type</th>
                                            <th>Entry Price</th>
                                            <th>Amount</th>
                                            <th>Take Profit</th>
                                            <th>Stop Loss</th>
                                            <th>Status</th>
                                            <th>Started At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($trades as $key => $trade)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ strtoupper(is_array($trade->signal->pair) ? implode('', $trade->signal->pair) : $trade->signal->pair) }}</td>
                                                <td>
                        <span class="badge bg-{{ $trade->signal->signal_type === 'buy' ? 'success' : 'danger' }}">
                            {{ ucfirst($trade->signal->signal_type) }}
                        </span>
                                                </td>
                                                <td>{{ number_format($trade->signal->entry_price, 2) }}</td>
                                                <td>${{ number_format($trade->amount, 2) }}</td>
                                                <td>{{ $trade->signal->take_profit ?? 'N/A' }}</td>
                                                <td>{{ $trade->signal->stop_loss ?? 'N/A' }}</td>
                                                @php
                                                    $statusColors = [
                                                        0 => 'warning',   // Pending
                                                        1 => 'success',     // Executed
                                                        2 => 'primary',      // Failed
                                                        3 => 'danger',     // Cancelled
                                                        // Add more if needed
                                                    ];
                                                    $badgeColor = $statusColors[$trade->status] ?? 'dark';
                                                @endphp

                                                <td> <span class="badge bg-{{ $badgeColor }}">
                                                            {{ $trade->status_text }}
                                                        </span></td>
                                                <td>{{ $trade->created_at->toDayDateTimeString() }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">No trades found.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="deep" role="tabpanel" tabindex="0">
                            <div class="recent-contact pb-2 pt-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        @include('dashboard.layout.footer')
    </div>


    <script>

        // Get the DOM elements
        const marketSelect = document.querySelector('select[name="market"]');
        const pairContainers = document.querySelectorAll('[data-pair-container]');

        // Hide all pair containers initially
        pairContainers.forEach(container => {
            container.style.display = "none";
        });

        // Add event listener to the market select dropdown
        marketSelect.addEventListener("change", () => {
            const selectedMarket = marketSelect.value;

            // Hide all pair containers
            pairContainers.forEach(container => {
                container.style.display = "none";
            });

            // Show the corresponding pair container if a valid market is selected
            if (selectedMarket) {
                const targetContainer = document.querySelector(`[data-pair-container="${selectedMarket}"]`);
                if (targetContainer) {
                    targetContainer.style.display = "block";
                }
            }
        });

    </script>
@endsection
