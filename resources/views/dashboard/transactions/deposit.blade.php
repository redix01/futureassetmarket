@extends('dashboard.layout.app')
@section('content')
    <style>
        .payment-grid {
            display: grid;
            grid-template-columns: 1fr 2fr 3fr 2fr;
            grid-gap: 10px;
            width: 100%;
        }

        .payment-grid-header, .payment-grid-row {
            display: contents;
        }

        .payment-grid div {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .payment-grid-header div {
            font-weight: bold;
        }

        .payment-grid-row div {
            padding: 10px;
        }

        .payment-grid-row:last-child div {
            border-bottom: none;
        }

    </style>

    <div class="container-fluid main-content px-2 px-lg-4">
        <div class="card mt-3 my-2 bg-dark">
            <div class="card-body d-none">

                <ul class="nav nav-pills justify-content-center">
                   <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('user.deposit') }}"> Deposit</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.bankDeposit') }}">Bank Deposit</a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="row my-2 g-3 g-lg-4">
          <div class="col-lg-7 offset-lg-2">
            <div class="right">
              <div style="background-color: #171f2a" class="card my-2 ">
                    <div class="card-header">
                        <h4 class="mb-0 text-center">Make Deposit</h4>
                    </div>
                    <div class="card-body px-3 py-5">
                        <form action="{{ route('user.processDeposit') }}" method="POST" enctype="multipart/form-data"
                              class="mx-auto" style="max-width: 360px">
                            @csrf

                            <p>To deposit, choose the payment method and make the payment to the displayed
                                address. After payment has been made, come back to fill this form.</p>

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
                            <div class="form-group mb-2">
                                <div class="col-md-12">
                                    <label class="fw-semibold mb-2 mt-3">Payment Method</label>
                                    <select class="form-control" name="payment_method_id">
                                       @foreach($wallets as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label>Amount</label>
                                <input type="number" name="amount" class="form-control" required="">
                            </div>
                            <div class="text-center mt-2">
                                 <button class="btn btn-success btn-block mt-3 ">Process Deposit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 py-3">
            <div style="background-color: #171f2a" class="card my-2">
                <div class="card-header">
                    <h4 class="m-4">Deposits History</h4>
                </div>
                <div class="card-body px-3 py-5">
                    <div class="table-responsive">
                            <table class="table table-striped text-white">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach($deposits as $index => $item)
                                        <tr>
                                            <td class="text-white">{{ $index+1 ."SRX2#" }}</td>
                                            <td class="text-white">${{ number_format($item->amount, 2) ?? '' }}</td>
                                            <td class="text-white">{{ optional($item->payment_method)->name ?? 'Bank' }}</td>
                                            <td>
                                                @if($item->status == 0)
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($item->status == 2)
                                                    <span class="badge bg-danger">Declined</span>
                                                @else
                                                    <span class="badge bg-success">Successful</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                </div>
            </div>
        </div>



      </div>



    <script>
        document.getElementById("customFile").addEventListener("change", function () {
            var fileName = this.files[0].name;

            var label = this.nextElementSibling;
            label.textContent = fileName;
        });
    </script>





    <!-- Script -->
<script>
    // Function to toggle the collapse
    document.addEventListener('DOMContentLoaded', function () {
        const accordions = document.querySelectorAll('.card-link');
        accordions.forEach(accordion => {
            accordion.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href').replace('#', '');
                const target = document.getElementById(targetId);
                const isOpen = target.classList.contains('show');

                // Close all open collapses
                document.querySelectorAll('.collapse.show').forEach(collapse => {
                    collapse.classList.remove('show');
                });

                // Toggle the clicked collapse
                if (!isOpen) {
                    target.classList.add('show');
                } else {
                    target.classList.remove('show');
                }

                e.preventDefault();
            });
        });
    });

    // Function to copy wallet address to clipboard
    function copyFunction(walletId) {
        const walletInput = document.getElementById('wallet-' + walletId);
        walletInput.select();
        document.execCommand("copy");

        // Show the toast notification
        const toast = document.getElementById('toast-' + walletId);
        toast.style.display = 'block';

        // Hide the toast after 2 seconds
        setTimeout(function () {
            toast.style.display = 'none';
        }, 2000);
    }
</script>

@endsection
