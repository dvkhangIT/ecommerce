 <script>
   $(document).ready(function() {
     $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
     // add to cart
     $('.shopping-cart-form').on('submit', function(e) {
       e.preventDefault();
       let formData = $(this).serialize();
       $.ajax({
         type: "POST",
         url: "{{ route('add-to-cart') }}",
         data: formData,
         success: function(response) {
           if (response.status === 'success') {
             getCartCount();
             fetchSidebarCartProducts();
             $('.mini_cart_actions').removeClass('d-none');
             toastr.success(response.message);
           } else if (response.status === 'error') {
             toastr.error(response.message);
           }
         }
       });
     })
     // cart count
     function getCartCount() {
       $.ajax({
         type: "GET",
         url: "{{ route('cart-count') }}",
         success: function(response) {
           $('#cart-count').text(response);
         }
       });
     }

     function fetchSidebarCartProducts() {
       $.ajax({
         type: "GET",
         url: "{{ route('cart-products') }}",
         success: function(response) {
           console.log(response);
           $('.mini_cart_wrapper').html('');
           var html = '';
           for (let item in response) {
             let product = response[item];
             html += `<li id="mini_cart_${product.rowId}">
                <div class="wsus__cart_img">
                    <a href="{{ url('product-detail') }}/${product.options.slug}"><img src="{{ asset('/') }}${product.options.image}" alt="product" class="img-fluid w-100"></a>
                     <a class="wsis__del_icon remove_sidebar_product" data-id="${product.rowId}" href="#"><i
                  class="fas fa-minus-circle"></i></a>
                </div>
                <div class="wsus__cart_text">
                    <a class="wsus__cart_title" href="{{ url('product-detail') }}/${product.options.slug}">${product.name}</a>
                    <p>{{ $settings->currency_icon }}${product.price}</p>
                    <small>Variant total:
                    {{ $settings->currency_icon }}${product.options.variants_total}</small>
                    <br>
                    <small>Qty: ${product.qty}</small>
                </div>
                </li>`;
           }
           $('.mini_cart_wrapper').html(html);
           getSidebarCartSubTotal();
         }
       });
     }
     // remove product from sidebar cart
     $('body').on('click', '.remove_sidebar_product', function(e) {
       e.preventDefault();
       let rowId = $(this).data('id');
       $.ajax({
         type: "POST",
         url: "{{ route('cart.remove-sidebar-product') }}",
         data: {
           rowId: rowId,
         },
         success: function(response) {
           let productId = '#mini_cart_' + rowId;
           $(productId).remove();
           getCartCount();
           getSidebarCartSubTotal();
           if ($('.mini_cart_wrapper').find('li').length === 0) {
             $('.mini_cart_actions').addClass('d-none');
             $('.mini_cart_wrapper').html('<li class="text-center">Cart Is Empty</li>');
           }
           toastr.success(response.message);
         }
       });
     })
     // get sidebar cart sub total
     function getSidebarCartSubTotal() {
       $.ajax({
         type: "GET",
         url: "{{ route('cart.sidebar-product-total') }}",
         success: function(response) {
           $('#mini_cart_subtotal').text("{{ $settings->currency_icon }}" + response);
         }
       });
     }
     // add product to wishlist
     $('.add_to_wishlist').on('click', function(e) {
       e.preventDefault();
       let id = $(this).data('id');
       $.ajax({
         type: "GET",
         url: "{{ route('user.wishlist.store') }}",
         data: {
           id
         },
         success: function(response) {
           if (response.status === 'success') {
             $('#wishlist_count').text(response.count);
             toastr.success(response.message);
           } else if (response.status === 'error') {
             toastr.error(response.message);
           }
         }
       });
     });
   });

   // newsletter
   $('#newsletter').on('submit', function(e) {
     e.preventDefault();
     let data = $(this).serialize();
     $.ajax({
       type: "POST",
       url: "{{ route('newsletter-request') }}",
       data: data,
       beforeSend: function() {
         $('.subscribe-btn').text('Loading...');
       },
       success: function(response) {
         if (response.status === 'success') {
           $('.newsletter_email').val('');
           $('.subscribe-btn').text('subscribe');
           toastr.success(response.message);
         } else if (response.status === 'error') {
           $('.subscribe-btn').text('subscribe');
           toastr.error(response.message);
         }
       },
       error: function(response) {
         let errors = response.responseJSON.errors
         if (errors) {
           $.each(errors, function(key, value) {
             toastr.error(value);
           });
         }
         $('.subscribe-btn').text('subscribe');
       }
     });
   });
 </script>
