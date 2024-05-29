<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/invoice.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css'>
    <title>Invoice</title>
</head>

<body>
    <div class="container mt-6 mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-7">
                <div class="card">
                    <div class="card-body p-5">
                        <h2>
                            Hey , {{ $checkout->user->name }}
                        </h2>
                        <p class="fs-sm">
                            This is the receipt for a payment of <strong>@rupiah($checkout->total)</strong> you made to My
                            Healthy Shop.
                        </p>

                        <div class="border-top border-gray-200 pt-4 mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-muted mb-2">Invoice Code</div>
                                    <strong>{{ $checkout->invoice_code }}</strong>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <div class="text-muted mb-2">Invoice Date</div>
                                    <strong>{{ $checkout->created_at->format('Y/M/d') }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="border-top border-gray-200 mt-4 py-4">
                            <div class="row">
                                <div class="col-md-6 text-md-start">
                                    <div class="text-muted mb-2">Payment To</div>
                                    <strong>
                                        {{ $checkout->user->name }}
                                    </strong>
                                    <p class="fs-sm">
                                        {{ $checkout->user->address }}
                                        <br>
                                        {{ $checkout->user->phone_number }}
                                        <br>
                                        <a href="#!" class="text-purple">{{ $checkout->user->email }}
                                        </a>
                                    </p>
                                    <form action="/checkouts/edit/status" method="POST">
                                        @csrf
                                        <input type="hidden" name="invoice_code" value="{{ $checkout->invoice_code }}">
                                        <button name="status"
                                            class="btn text-uppercase @if ($checkout->status == 'paid') btn-success
                                            @else btn-danger  @endif "value="paid"> {{ $checkout->status }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table border-bottom border-gray-200 mt-3">
                            <thead>
                                <tr>
                                    <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Description
                                    </th>
                                    <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Qty
                                    </th>
                                    <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">
                                        Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkout->cart as $cart)
                                    <tr>
                                        <td class="px-0">{{ $cart->product->nama_product }}</td>
                                        <td class="px-0">{{ $cart->qty }}</td>
                                        <td class="text-end px-0">@rupiah($cart->product->price * $cart->qty)</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="mt-5">
                            <div class="d-flex justify-content-end">
                                <p class="text-muted me-3">Subtotal:</p>
                                <span>@rupiah((100 / (100 - $checkout->coupon)) * ($checkout->total - 15000))</span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <p class="text-danger me-3">Discount:</p>
                                <span class="text-danger">@rupiah(((100 / (100 - $checkout->coupon)) * ($checkout->total - 15000) * $checkout->coupon) / 100)</span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <p class="text-muted me-3">Shipping:</p>
                                <span>@rupiah(15000)</span>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <h5 class="me-3">Total:</h5>
                                <h5 class="text-success">@rupiah($checkout->total)</h5>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>
