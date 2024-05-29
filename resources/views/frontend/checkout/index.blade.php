<!DOCTYPE html>
<html lang="en">

@include('frontend.partials.head')

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    @include('frontend.partials.navbar')
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    @include('frontend.partials.modal_search')
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            <form action="/input-invoice" method="POST">
                @csrf
                <div class="row g-5">
                    <div class="">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $c)
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{ Storage::url($c->product->gambar_product) }}"
                                                        class="img-fluid rounded-circle"
                                                        style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">{{ $c->product->nama_product }}</td>
                                            <td class="py-5">@rupiah($c->product->price)</td>
                                            <td class="py-5">{{ $c->qty }}x</td>
                                            <td class="py-5">@rupiah($c->total_harga)</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="text-dark fw-bold">Subtotal</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="">
                                                <p class="">@rupiah($subtotal )</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="text-danger fw-bold">Discount</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="">
                                                <p class="text-danger">@rupiah(($subtotal*$discount/100))</p>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="text-dark fw-bold">Shipping</p>
                                        </td>

                                        <td class="py-5">
                                            <div class="">
                                                <p class="text-dark">@rupiah(15000)</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark fw-bold text-uppercase py-3">TOTAL</p>
                                        </td>

                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark fw-bold">
                                                  @rupiah($subtotal - ($subtotal * $discount) / 100 + 15000)</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <input type="hidden" name="total" id="total" value="{{ $subtotal - ($subtotal * $discount) / 100 + 15000 }}">
                            <input type="hidden" name="discount" id="discount" value="{{$discount}}">
                            <div
                                class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0"
                                            id="payment-1" name="payment" value="transfer">
                                        <label class="form-check-label" for="Transfer-1">Direct Bank Transfer</label>
                                    </div>
                                    <p class="text-start text-dark">Make your payment directly into our bank account.
                                        Please
                                        use your Order ID as the payment reference. Your order will not be shipped until
                                        the
                                        funds have cleared in our account.</p>
                                </div>
                            </div>
                            <div
                                class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">

                                </div>
                            </div>
                            <div
                                class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0"
                                            id="payment-2" name="payment" value="delivery">
                                        <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit"
                                    class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                                    Order</button>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->


    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->

    <!-- Copyright Start -->
    @include('frontend.partials.copyright')
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    @include('frontend.partials.script')
</body>

</html>
