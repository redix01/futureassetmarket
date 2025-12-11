@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <h4>Stock Orders</h4>
                        <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tabItem0">Trade Room Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#tabItem1">Buy History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tabItem2">Sell History</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="tabItem0">
                                    <div class="row g-3 mb-3">
                                        <div class="col-lg-12">
                                            <div class="card card-bordered card-preview">
                                                <div class="card-inner">
                                                    <h4 class="m-3">Trade Room Orders</h4>

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
                                                    </div>
                                                      <div class="table-responsive">
                                                            <table class="table ">
                                                               <thead >
                                                               <tr>
                                                                   <th>Date</th>
                                                                    <th>User</th>
                                                                    <th>Market</th>
                                                                    <th>Pair</th>
                                                                    <th>Type</th>
                                                                    <th>Amount</th>
                                                                    <th>Profit</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                               </tr>
                                                               </thead>
                                                               <tbody >
                                                               @foreach($tradeOrders as $item)
                                                                   <tr>
                                                                       <td>{{ date('d M, Y h:i A', strtotime($item->created_at)) ?? '' }}</td>
                                                                       <td>{{ $item->user->name ?? '' }}</td>
                                                                       <td>{{ $item->market ?? '' }}</td>
                                                                       <td>{{ $item->tradePair() ?? '' }}</td>
                                                                       <td>{{ strtoupper($item->trade_type ?? '') }}</td>
                                                                       <td>${{ number_format($item->amount, 2) ?? ''}}</td>
                                                                       <td class="{{ ($item->profit ?? 0) > 0 ? 'text-success' : (($item->profit ?? 0) < 0 ? 'text-danger' : '') }}">
                                                                            ${{ number_format($item->profit ?? 0, 2) }}
                                                                        </td>
                                                                       <td>{!! $item->status() !!}</td>
                                                                       <td>
                                                                        <div class="d-flex gap-1">
                                                                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editTradeProfitModal-{{ $item->id }}" title="Edit Profit">
                                                                               <em class=" ni ni-edit-alt"></em>
                                                                            </a>
                                                                            @if($item->status == 1)
                                                                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#closeTradeRoomModal-{{ $item->id }}" title="Close Trade">
                                                                               <em class=" ni ni-cross"></em>
                                                                            </a>
                                                                            @endif
                                                                        </div>
                                                                       </td>
                                                                   </tr>
                                                               @endforeach
                                                               </tbody>
                                                           </table>
                                                        </div>

                                                        @foreach($tradeOrders as $item)
                                                            <!-- Edit Trade Profit Modal -->
                                                            <div class="modal fade" id="editTradeProfitModal-{{ $item->id }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit Trade Profit</h5>
                                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('admin.updateTradeRoomProfit', $item->id) }}" method="POST" class="form-validate is-alter">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Current Profit</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" class="form-control" value="${{ number_format($item->profit ?? 0, 2) }}" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="profit">New Profit ($)</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.01" name="profit" class="form-control" id="profit" value="{{ $item->profit ?? 0 }}" required>
                                                                                        <small class="form-text text-muted">Enter the profit or loss amount (positive for profit, negative for loss)</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <button type="submit" class="btn btn-primary">Update Profit</button>
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Close Trade Room Modal -->
                                                            @if($item->status == 1)
                                                            <div class="modal fade" id="closeTradeRoomModal-{{ $item->id }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Close Trade</h5>
                                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Are you sure you want to close this trade?</p>
                                                                            <p><strong>User:</strong> {{ $item->user->name ?? '' }}</p>
                                                                            <p><strong>Market:</strong> {{ $item->market ?? '' }}</p>
                                                                            <p><strong>Pair:</strong> {{ $item->tradePair() ?? '' }}</p>
                                                                            <p><strong>Amount:</strong> ${{ number_format($item->amount, 2) }}</p>
                                                                            <p><strong>Current Profit:</strong> ${{ number_format($item->profit ?? 0, 2) }}</p>
                                                                            <form action="{{ route('admin.closeTradeRoom', $item->id) }}" method="POST" class="mt-3">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <button type="submit" class="btn btn-danger">Close Trade</button>
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="tabItem1">
                                    <div class="row g-3 mb-3">
                                        <div class="col-lg-12">
                                            <div class="card card-bordered card-preview">
                                                <div class="card-inner">
                                                    <h4 class="m-3">Buy Orders</h4>

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
                                                    </div>
                                                      <div class="table-responsive">
                                                            <table class="table ">
                                                               <thead >
                                                               <tr>
                                                                   <th>Date</th>
                                                                    <th>User</th>
                                                                    <th>Stock</th>
                                                                    <th>Amount</th>
                                                                    <th>PNL</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                               </tr>
                                                               </thead>
                                                               <tbody >
                                                               @foreach($data as $item)
                                                                   <tr>
                                                                       <td>{{ date('d M, Y h:i A', strtotime($item->created_at)) ?? '' }}</td>
                                                                       <td>{{ $item->user->name ?? '' }}</td>
                                                                       <td>{{ $item->stock->symbol ?? '' }}</td>
                                                                       <td>${{ number_format($item->amount, 2) ?? ''}}</td>
                                                                       <td class="{{ $item->pnl > 0 ? 'text-success' : ($item->pnl < 0 ? 'text-danger' : '') }}">
                                                                            {{ number_format($item->pnl, 2) ?? '' }}%
                                                                        </td>
                                                                       <td>{!! $item->status() !!}</td>
                                                                       <td>
                                                                        <div class="d-flex gap-1">
                                                                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editPnlModal-{{ $item->id }}" title="Edit PNL">
                                                                               <em class=" ni ni-edit-alt"></em>
                                                                            </a>
                                                                            @if($item->status == 2)
                                                                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#closeTradeModal-{{ $item->id }}" title="Close Trade">
                                                                               <em class=" ni ni-cross"></em>
                                                                            </a>
                                                                            @endif
                                                                        </div>
                                                                       </td>
                                                                   </tr>
                                                               @endforeach
                                                               </tbody>
                                                           </table>
                                                        </div>

                                                     @foreach($data as $item)
                                                            <!-- Edit PNL Modal -->
                                                            <div class="modal fade" id="editPnlModal-{{ $item->id }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit Trade PNL</h5>
                                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('admin.updateTradePnl', $item->id) }}" method="POST" class="form-validate is-alter">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Current PNL</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" class="form-control" value="{{ number_format($item->pnl ?? 0, 2) }}%" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="pnl">New PNL (%)</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.01" name="pnl" class="form-control" id="pnl" value="{{ $item->pnl ?? 0 }}" required>
                                                                                        <small class="form-text text-muted">Enter the profit or loss percentage (positive for profit, negative for loss)</small>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <button type="submit" class="btn btn-primary">Update PNL</button>
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Close Trade Modal -->
                                                            @if($item->status == 2)
                                                            <div class="modal fade" id="closeTradeModal-{{ $item->id }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Close Trade</h5>
                                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Are you sure you want to close this trade?</p>
                                                                            <p><strong>User:</strong> {{ $item->user->name ?? '' }}</p>
                                                                            <p><strong>Stock:</strong> {{ $item->stock->symbol ?? '' }}</p>
                                                                            <p><strong>Amount:</strong> ${{ number_format($item->amount, 2) }}</p>
                                                                            <p><strong>Current PNL:</strong> {{ number_format($item->pnl ?? 0, 2) }}%</p>
                                                                            <form action="{{ route('admin.closeStockTrade', $item->id) }}" method="POST" class="mt-3">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <button type="submit" class="btn btn-danger">Close Trade</button>
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabItem2">
                                    <div class="row g-3 mb-3">
                                        <div class="col-lg-12">
                                            <div class="card card-bordered card-preview">
                                                <div class="card-inner">
                                                    <h4 class="m-3">Sell Orders</h4>

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
                                                    </div>
                                                      <div class="table-responsive">
                                                            <table class="table ">
                                                               <thead >
                                                               <tr>
                                                                   <th>Date</th>
                                                                    <th>User</th>
                                                                    <th>Stock</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                               </tr>
                                                               </thead>
                                                               <tbody >
                                                               @foreach($sellHistory as $item)
                                                                   <tr>
                                                                       <td>{{ date('d M, Y h:i A', strtotime($item->created_at)) ?? '' }}</td>
                                                                       <td>{{ $item->user->name ?? '' }}</td>
                                                                       <td>{{ $item->buy_stock->stock->symbol ?? '' }}</td>
                                                                       <td>${{ number_format($item->amount, 2) ?? ''}}</td>
                                                                       <td>{!! $item->status() !!}</td>
                                                                       <td>
                                                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item->id }}">
                                                                           Delete
                                                                        </a>

                                                                       </td>
                                                                   </tr>
                                                               @endforeach
                                                               </tbody>
                                                           </table>
                                                        </div>

                                                     @foreach($sellHistory as $item)
                                                          <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete this record? This action cannot be undone.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{ route('admin.deleteTrade', $item->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    </div>
                    <!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

   <!-- Modal Trigger Code -->

<!-- Modal Content Code -->


@endsection
