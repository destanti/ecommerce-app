<!DOCTYPE html>
<html lang="en">

   @include('frontend.partials.head')

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
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
            <h1 class="text-center text-white display-6">PROMO</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Promo</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        @include('frontend.partials.banner')


        <!-- Footer Start -->
        @include('frontend.partials.footer')
        <!-- Footer End -->

        <!-- Copyright Start -->
        @include('frontend.partials.copyright')
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

   @include('frontend.partials.script')

    </body>

</html>