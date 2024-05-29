<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5" id="footer">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h2 class="text-primary mb-0">My Healthy Shop</h2>
                        <p class="text-secondary mb-0">Fresh products</p>
                    </a>
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        @foreach ($sosmed as $s)
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="{{ $s->link_sosmed }}" target="__blank"><i class="{{ $s->icon_sosmed }}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <img src="{{ asset('frontend')}}/img/icon.jpg" class="rounded-circle" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Shop Info</h4>
                    <a class="btn-link" href="">About Us</a>
                    <a class="btn-link" href="">Contact Us</a>
                    <a class="btn-link" href="">Privacy Policy</a>
                    <a class="btn-link" href="">Terms & Condition</a>
                    <a class="btn-link" href="">Return Policy</a>
                    <a class="btn-link" href="">FAQs & Help</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Account</h4>
                    <a class="btn-link" href="">My Account</a>
                    <a class="btn-link" href="">Shop details</a>
                    <a class="btn-link" href="">Shopping Cart</a>
                    <a class="btn-link" href="">Wishlist</a>
                    <a class="btn-link" href="">Order History</a>
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Contact</h4>
                    <p>{{ $about->address }}</p>
                    <p>{{ $about->email }}</p>
                    <p>{{ $about->phone }}</p>
                    <p>Payment Accepted</p>
                    <img src="{{asset('frontend')}}/img/payment.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>