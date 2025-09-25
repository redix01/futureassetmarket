@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">

                        <div class="row g-gs">

                            <div class="col-lg-12">
                                <div class="card card-bordered card-full">
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
                                    <div class="card-inner">

                                        <h4 class="m-2">Signal Trading Plans</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped ">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User</th>
                                                    <th>Pair</th>
                                                    <th>Signal Type</th>
                                                    <th>Amount</th>
                                                    <th>Entry Price</th>
                                                    <th>Take Profit</th>
                                                    <th>Stop Loss</th>
                                                    <th>Status</th>
                                                    <th>Trade Time</th>
                                                    <th>PNL</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse ($trades as $key => $trade)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $trade->user->name ?? 'N/A' }}</td>
                                                        <td>{{ strtoupper(is_array($trade->signal->pair) ? implode('', $trade->signal->pair) : $trade->signal->pair) }}</td>
                                                        <td>
                        <span class="badge bg-{{ $trade->signal->signal_type === 'buy' ? 'success' : 'danger' }}">
                            {{ ucfirst($trade->signal->signal_type) }}
                        </span>
                                                        </td>
                                                        <td>{{ $trade->amount }}</td>
                                                        <td>{{ number_format($trade->signal->entry_price, 2) }}</td>
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
                                                        <td>{{ $trade->pnl ?? "N/A" }}</td>
                                                        <td><a href="" data-bs-toggle="modal"
                                                               data-bs-target="#modalForm-{{ $trade->id }}"
                                                               class="btn btn-sm btn-primary"><em
                                                                    class="ni ni-edit"></em></a></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10" class="text-center">No trades found.</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        @foreach($trades as $item)

                                            <div class="modal fade" id="modalForm-{{ $item->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Trade</h5>
                                                            <a href="#" class="close" data-bs-dismiss="modal"
                                                               aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.tradePNL', $item->id) }}"
                                                                  method="POST" class="form-validate is-alter"
                                                                  enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="trade_id"
                                                                       value="{{ $item->id }}">


                                                                <!-- Stop Loss -->
                                                                <div class="form-group mt-3">
                                                                    <label class="form-label" for="stop_loss">Trade
                                                                        Profit</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" step="0.01"
                                                                               name="amount" class="form-control"
                                                                               id="stop_loss">
                                                                    </div>
                                                                </div>

                                                                <!-- Submit Button -->
                                                                <div class="form-group mt-4">
                                                                    <button type="submit" name="type" value="add"
                                                                            class="btn btn-sm btn-primary">Add Profit
                                                                    </button>
                                                                    <button type="submit" name="type" value="sub"
                                                                            class="btn btn-sm btn-danger">Add Loss
                                                                    </button>
                                                                    <a href="{{ route('admin.closeTrade', $item->id) }}"
                                                                       class="btn btn-sm btn-secondary">Close Trade</a>

                                                                </div>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1"
                                                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Confirm
                                                                Delete</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this item? This action
                                                            cannot be undone.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel
                                                            </button>
                                                            <form id="deleteForm" method="POST"
                                                                  action="{{ route('admin.signal.destroy', $item->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div><!-- .card -->
                        </div><!-- .col -->


                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Trade Signal</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.signal.store') }}" method="POST" class="form-validate is-alter"
                          enctype="multipart/form-data">
                        @csrf
                        <!-- Min Amount -->
                        <div class="form-group mt-3">
                            <label class="form-label" for="min_amount">Min Amount</label>
                            <div class="form-control-wrap">
                                <input type="number" step="0.001" name="min_amount" class="form-control"
                                       id="min_amount">
                            </div>
                        </div>

                        <!-- Pair -->
                        <div class="form-group mt-3">
                            <label class="form-label" for="pair">Trading Pair</label>
                            <div class="form-control-wrap">
                                <input type="text" name="pair" class="form-control" id="pair"
                                       placeholder="e.g., BTC/USD" required>
                            </div>
                        </div>

                        <!-- Signal Type -->
                        <div class="form-group mt-3">
                            <label class="form-label" for="signal_type">Signal Type</label>
                            <div class="form-control-wrap">
                                <select name="signal_type" id="signal_type" class="form-control" required>
                                    <option value="">-- Select Type --</option>
                                    <option value="buy">Buy</option>
                                    <option value="sell">Sell</option>
                                </select>
                            </div>
                        </div>

                        <!-- Entry Price -->
                        <div class="form-group mt-3">
                            <label class="form-label" for="entry_price">Entry Price</label>
                            <div class="form-control-wrap">
                                <input type="number" step="0.01" name="entry_price" class="form-control"
                                       id="entry_price" required>
                            </div>
                        </div>

                        <!-- Take Profit -->
                        <div class="form-group mt-3">
                            <label class="form-label" for="take_profit">Take Profit</label>
                            <div class="form-control-wrap">
                                <input type="number" step="0.01" name="take_profit" class="form-control"
                                       id="take_profit">
                            </div>
                        </div>

                        <!-- Stop Loss -->
                        <div class="form-group mt-3">
                            <label class="form-label" for="stop_loss">Stop Loss</label>
                            <div class="form-control-wrap">
                                <input type="number" step="0.01" name="stop_loss" class="form-control" id="stop_loss">
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="form-group mt-3">
                            <label class="form-label" for="notes">Notes (optional)</label>
                            <div class="form-control-wrap">
                                <textarea name="notes" class="form-control" id="notes" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Expiration Time -->
                        <div class="form-group mt-3">
                            <label class="form-label" for="expires_at">Expires At</label>
                            <div class="form-control-wrap">
                                <input type="datetime-local" name="expires_at" class="form-control" id="expires_at">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>




    <script>
        function copyToClipboard(elementId) {
            const copyText = document.getElementById(elementId);
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            document.execCommand("copy");
            alert("Copied: " + copyText.value);
        }
    </script>
@endsection
