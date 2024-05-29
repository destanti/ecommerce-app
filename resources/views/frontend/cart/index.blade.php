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

    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $c)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ Storage::url($c->product->gambar_product) }}"
                                            class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                            alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{ $c->product->nama_product }}</p>
                                </td>
                                <td>
                                    <p id="price-{{ $c->cart_id }}" class="mb-0 mt-4">@rupiah($c->product->price)</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input data-target-cart="{{ $c->cart_id }}"
                                            data-target-price="{{ $c->product->price }}" type="text"
                                            class="form-control form-control-sm text-center border-0"
                                            value="{{ $c->qty }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p id="total-{{ $c->cart_id }}" class="mb-0 mt-4">@rupiah($c->total_harga)</p>
                                </td>
                                <td>
                                    <a href="/cart/destroy/{{ $c->cart_id }}"
                                        class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code"
                    id="code_coupon">
                <button onclick="checkcoupon()" class="btn border-secondary rounded-pill px-4 py-3 text-primary"
                    type="button">Apply
                    Coupon</button>
                <div class="alert alert-success d-none" role="alert" id="success">
                    <span id="success_message"></span>
                </div>
                <div class="alert alert-danger d-none" role="alert" id="warning">
                    <span id="warning_message"></span>
                </div>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0" id="subtotal" data-target-subtotal='0'>Rp 0</p>
                            </div>
                            <div class="d-flex justify-content-between mb-4 text-danger d-none" id="text_discount">
                                <h5 class="mb-0 me-4 text-danger">Discount:</h5>
                                <p class="mb-0" id="discount">Rp 0</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0" id="shipping">Rp 0</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end"></p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4" id="total">Rp 0</p>
                        </div>
                    <form action="/checkout" method="POST">
                        @csrf
                        <input type="hidden" name="subtotal" id="input_subtotal">
                        <input type="hidden" name="discount" id="input_discount">
                        <button
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="submit">Proceed Checkout</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->


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
