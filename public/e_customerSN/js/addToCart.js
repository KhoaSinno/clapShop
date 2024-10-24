$(document).on('click', '.add-to-cart', function (e) {
    e.preventDefault();
    var productId = $(this).data('id');

    $.ajax({
        url: `/customer/cart/add/${productId}`,
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content') // Lấy token từ meta
        },
        success: function (response) {
            alert('Sản phẩm đã được thêm vào giỏ hàng!');
            // Cập nhật tổng tiền ngay lập tức
            $('.header__cart__price span').text(response.total);
            $('.span__quantity_cart').text(response.totalQuantity);
        },
        error: function (xhr) {
            alert('Đã xảy ra lỗi. Vui lòng thử lại!');
        }
    });
});

  // $(document).on('click', '.add-to-cart', function(e) {
    //     e.preventDefault();
    //     var productId = $(this).data('id');

    //     $.ajax({
    //         url: `/customer/cart/add/${productId}`,
    //         method: 'POST',
    //         data: {
    //             _token: '{{ csrf_token() }}'
    //         },
    //         success: function(response) {
    //             alert('Sản phẩm đã được thêm vào giỏ hàng!');
    //             // Cập nhật tổng tiền ngay lập tức
    //             $('.header__cart__price span').text(response.total);
    //             $('.span__quantity_cart').text(response.totalQuantity);
    //         },
    //         error: function(xhr) {
    //             alert('Đã xảy ra lỗi. Vui lòng thử lại!');
    //         }
    //     });
    // });
