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
        <h1 class="text-center text-white display-6">Produk Segar</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/">Pages</a></li>
            <li class="breadcrumb-item active text-white">Produk Segar</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Produk Segar Hari ini!</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        
                        <div class="col-6 my-3"></div>
                        
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">

                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @foreach ($kategori as $k)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="/katalog/{{$k->kategori_product}}"><i class="fas fa-apple-alt me-2"></i>{{$k->kategori_product}}</a>
                                                        <span>({{$k->total}})</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">Produk Baru</h4>
                                    @foreach ($new_product as $n)
                                    <a href="/detail/{{$n->product_id}}"><div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4 my-2" style="width: 100px; height: 100px;">
                                            <img src="{{Storage::url($n->gambar_product)}}" class="img-fluid rounded" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">{{$n->nama_product}}</h6>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">@rupiah($n->price)</h5>
                                                
                                            </div>
                                        </div>
                                    </div></a>
                                    
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
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @foreach ($product as $p)
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="border border-primary rounded position-relative vesitable-item"
                                            style="height: 500px">
                                            <div class="vesitable-img">
                                                <img src="{{ Storage::url($p->gambar_product) }}"
                                                    class="img-fluid w-100 rounded-top" style="height: 250px"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; right: 10px;">{{ $p->status }}</div>
                                            <div class="p-4 rounded-bottom">

                                                <a href="/detail/{{ $p->product_id }}"><h4>{{ $p->nama_product }}</h4></a>

                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">@rupiah($p->price)</p>
                                                    <button
                                                        onclick="addtocart({{ $p->product_id }},{{ $p->price }})"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary position-absolute bottom-0 mb-3"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fruits Shop End-->


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
