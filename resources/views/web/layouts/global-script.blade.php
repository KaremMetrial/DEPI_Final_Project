<script>
    function loadProductModel(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route("load-product-model", ":productId") }}'.replace(':productId', productId),
            beforeSend: function () {
                $('.overlay').addClass('active');
            },
            success: function (response) {
                $('.load_product_model_body').html(response);
                $('#cartModal').modal('show')
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
            complete: function () {
                $('.overlay').removeClass('active');
            }
        });
    }

    function updateSidebarCart() {

        $.ajax({
            method: 'GET',
            url: '{{ route("get-cart-products") }}',
            beforeSend: function () {
                // $('.overlay').addClass('active');
            },
            success: function (response) {
                $('.cart_contents').html(response)
                let cartTotal = $('#cart_total').val();
                let cartCount = $('#cart_product_count').val();
                $('.cart_subtotal').text("{{ currencyPosition(':cartTotal') }}".replace(':cartTotal', cartTotal));
                $('.cart_count').text(cartCount);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
            complete: function () {

            }
        });
    }

    function removeProductFormSideBar($rowId) {
    alert($rowId);
        $.ajax({
            method: 'GET',
            url: '{{ route('cart-product-remove',':rowId') }}'.replace(':rowId', $rowId),
            beforeSend: function () {

            },
            success: function (response) {
                toastr.success(response.message);
            },
            error: function (xhr, status, error) {
                toastr.error();
                console.error(error);
            },
            complete: function () {

            }
        });
    }
</script>
