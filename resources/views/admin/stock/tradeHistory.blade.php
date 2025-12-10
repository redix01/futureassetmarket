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
                                                                    <th>Status</th>
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
                                                                       <td>{!! $item->status() !!}</td>
                                                                   </tr>
                                                               @endforeach
                                                               </tbody>
                                                           </table>
                                                        </div>
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
                                                                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm-{{ $item->id }}">
                                                                           <em class=" ni ni-edit-alt"></em></a>

                                                                       </td>
                                                                   </tr>
                                                               @endforeach
                                                               </tbody>
                                                           </table>
                                                        </div>

                                                     @foreach($data as $item)
                                                            <div class="modal fade" id="modalForm-{{ $item->id }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit Stock Profit</h5>
                                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('admin.addStockProfit', $item->id) }}" method="POST" class="form-validate is-alter" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <h4 class="m-3">${{ number_format($item->pnl, 2) }} </h4>
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="email-address">Amount</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.000001" name="amount" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <button type="submit" name="type" value="add" class="btn btn-primary">Add</button>
                                                                                </div>
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
