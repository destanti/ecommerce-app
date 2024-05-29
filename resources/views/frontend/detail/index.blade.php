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
        <h1 class="text-center text-white display-6">Product Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Product Detail</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="{{ Storage::url($product->gambar_product) }}" class="img-fluid rounded"
                                        style="height: 450px ">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <h4 class="fw-bold mb-3">{{ $product->nama_product }}</h4>
                            <p class="mb-3">Category: {{ $product->kategori_product }}</p>
                            <h5 class="fw-bold mb-3">@rupiah($product->price)</h5>
                            <p class="mb-4">{{ $product->description }}</p>

                            <button onclick="addtocart({{ $product->product_id }},{{ $product->price }})"
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
                        </div>

                        <form action="/review/store" class="mt-5" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->product_id }}">
                            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" class="form-control border-0 me-4" name="name" id="name" value="{{Auth::user()?->name ?? ''}}"
                                            placeholder="Your Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" class="form-control border-0" name="email" id="email" value="{{Auth::user()?->email ?? ''}}"
                                         placeholder="Your Email *" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea class="form-control border-0" cols="30" rows="8"
                                            placeholder="Your Review *" name="message" id="message" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                       
                                        <button type="submit"
                                            class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                            Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            
                            <div class="mb-4">
                                <h4>Categories</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    @foreach ($kategori as $k)
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="/katalog/{{ $k->kategori_product }}"><i
                                                        class="fas fa-apple-alt me-2"></i>{{ $k->kategori_product }}</a>
                                                <span>({{ $k->total }})</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h4 class="mb-3">Produk Baru</h4>
                            @foreach ($new_product as $n)
                                <a href="/detail/{{ $n->product_id }}">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4 my-2" style="width: 100px; height: 100px;">
                                            <img src="{{ Storage::url($n->gambar_product) }}" class="img-fluid rounded"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">{{ $n->nama_product }}</h6>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">@rupiah($n->price)</h5>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach


                            <div class="d-flex justify-content-center my-4">
                                <a href="#"
                                    class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                    More</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="position-relative">
                                <img src="{{ asset('frontend') }}/img/banner-fruits.jpg"
                                    class="img-fluid w-100 rounded" alt="">
                                <div class="position-absolute"
                                    style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    <h3 class="text-secondary fw-bold">My <br> Healthy <br> Shop</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="fw-bold mb-0">Related products</h1>
            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    @foreach ($related as $r)
                        <div class="border border-primary rounded position-relative vesitable-item" style="height: 500px">
                            <div class="vesitable-img">
                                <img src="{{Storage::url($r->gambar_product)}}" class="img-fluid w-100 rounded-top"
                                    alt="" style="height: 300px">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                style="top: 10px; right: 10px;">{{$r->kategori_product}}</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <a href="/detail/{{ $r->product_id }}"><h4>{{ $r->nama_product }}</h4></a>
                                
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">@rupiah($r->price)</p>
                                    <button onclick="addtocart({{$r->product_id}},{{$r->price}})"
                                        class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Single Product End -->


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
