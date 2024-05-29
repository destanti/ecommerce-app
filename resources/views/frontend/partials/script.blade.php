    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/lightbox/js/lightbox.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <script>
        cart();
        getsubtotal();

        // Jquery untuk mengirim data tanpa form 
        // posisi ada di index layouts
        function addtocart(product_id, price) {
            $.post("/cart/add", {
                    _token: '{{ csrf_token() }}',
                    menu_id: product_id,
                    total_harga: price,
                })
                .done(function(data) {
                    cart();
                    // alert("Data Loaded: " + data.messages);
                });
        }

        // Jquery untuk update data tanpa form
        // posisi ada di main.js di public
        function updateQty(qty, cart_id, price) {
            $.post("/cart/qty", {
                    _token: '{{ csrf_token() }}',
                    cart_id: cart_id,
                    qty: qty,
                    price: price,
                })
                .done(function(data) {
                    cart();
                    $('#total-' + cart_id).text(rupiah(price * qty));
                    getsubtotal();
                });
        }

        function getsubtotal() {
            $.get("/cart/subtotal").done(function(data) {
                $('#subtotal').text(rupiah(data.data));
                $('#subtotal').attr('data-target-subtotal', data.data);
                $('#input_subtotal').val(data.data);
                gettotal(data.data);
            });

        }

        function gettotal(subtotal, discount = 0) {
            $('#shipping').text(rupiah(15000));
            $('#total').text(rupiah(subtotal - (subtotal * discount / 100) + 15000));
        }

        function checkcoupon() {
            var coupon = $('#code_coupon').val();
            $.get("/cart/coupon/" + coupon).done(function(data) {
                if (data.success) {
                    $('#success').removeClass('d-none');
                    $('#warning').addClass('d-none');
                    $('#success_message').text(data.messages);
                    var subtotal = $('#subtotal').data('target-subtotal');
                    gettotal(subtotal, data.data.discount);
                    $('#text_discount').removeClass('d-none');
                    $('#discount').text('- ' + rupiah((subtotal * data.data.discount / 100)));
                    $('#input_discount').val(data.data.discount);
                } else {
                    $('#success').addClass('d-none');
                    $('#warning').removeClass('d-none');
                    $('#warning_message').text(data.messages);
                    var subtotal = $('#subtotal').data('target-subtotal');
                    gettotal(subtotal);
                    $('#text_discount').addClass('d-none');
                    $('#input_discount').val(0);
                }
            });
        }

        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }

        function cart() {
            $.get("/count").done(function(data) {
                $('#cart').text(data.data);
            });
        }
    </script>

    <script>
        $('#button_search').click(function (e) { 
            e.preventDefault();
            window.location.href='/search/'+ $('#search').val();

        });
    </script>
