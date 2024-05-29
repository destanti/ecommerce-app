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
        <h1 class="text-center text-white display-6">Transaction</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">Transaction History</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <div class="container-fluid py-5">
        <div class="container py-5">

            <div class="list-group">
                @foreach ($invoice as $i)
                    <a href="/invoice/{{$i->invoice_code}}" id="{{$i->invoice_code}}" class="list-group-item list-group-item-action" onmouseenter="document.getElementById('{{$i->invoice_code}}').classList.add('active')" onmouseleave="document.getElementById('{{$i->invoice_code}}').classList.remove('active')" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-3">{{ $i->invoice_code }}</h5>

                            @if ($i->status == 'paid')
                                <span class="fw-bold text-uppercase text-success">{{ $i->status }}</span>
                            @else
                                <span class="fw-bold text-uppercase text-danger">{{ $i->status }}</span>
                            @endif
                        </div>
                        <p class="mb-1">@rupiah($i->total)</p>
                        <small>{{ $i->created_at->format('d M Y') }}</small>
                    </a>
                @endforeach

            </div>
        </div>
    </div>


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
