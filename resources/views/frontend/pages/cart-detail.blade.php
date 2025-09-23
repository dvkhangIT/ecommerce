@extends('frontend.layouts.master')
@section('title')
  {{ $settings->site_name }} || Cart details
@endsection
@section('content')
  {{-- CART VIEW PAGE START --}}
  <section id="wsus__cart_view">
    @if (count($cartItems) === 0)
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="wsus__cart_list cart_empty p-3 p-sm-5 text-center">
              <p class="mb-4">your shopping cart is empty</p>
              <a href="{{ route('home') }}" class="common_btn"><i class="fal fa-store me-2"></i>view our
                product</a>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="container">
        <div class="row">
          <div class="col-xl-9">
            <div class="wsus__cart_list">
              <div class="table-responsive">
                <table>
                  <tbody>
                    <tr class="d-flex">
                      <th class="wsus__pro_img">
                        product item
                      </th>
                      <th class="wsus__pro_name">
                        product details
                      </th>
                      <th class="wsus__pro_status">
                        unit price
                      </th>
                      <th class="wsus__pro_select">
                        quantity
                      </th>
                      <th class="wsus__pro_tk">
                        total
                      </th>
                      <th class="wsus__pro_icon">
                        <a href="#" class="common_btn clear_cart">clear cart</a>
                      </th>
                    </tr>
                    @foreach ($cartItems as $item)
                      <tr class="d-flex">
                        <td class="wsus__pro_img"><img src="{{ asset($item->options->image) }}" alt="product"
                            class="img-fluid w-100">
                        </td>
                        <td class="wsus__pro_name">
                          <p>{!! $item->name !!}</p>
                          @foreach ($item->options->variants as $key => $variant)
                            <span>{{ $key }}:
                              {{ $variant['name'] }}
                              ({{ $settings->currency_icon . $variant['price'] }})
                            </span>
                          @endforeach
                        </td>
                        <td class="wsus__pro_status">
                          <h6>{{ $settings->currency_icon . $item->price }}
                          </h6>
                        </td>
                        <td class="wsus__pro_select">
                          <div class="product_qty_wrapper">
                            <button class="btn btn-danger product-decrement">-</button>
                            <input readonly class="product-qty" data-rowid="{{ $item->rowId }}" type="text"
                              min="1" max="100" value="{{ $item->qty }}" />
                            <button class="btn btn-success product-increment">+</button>
                          </div>
                        </td>
                        <td class="wsus__pro_tk">
                          <h6 id="{{ $item->rowId }}">
                            {{ $settings->currency_icon . ($item->price + $item->options->variants_total) * $item->qty }}
                          </h6>
                        </td>
                        <td class="wsus__pro_icon">
                          <a href="{{ route('cart.remove-product', $item->rowId) }}"><i class="far fa-times"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
              <h6>total cart</h6>
              <p>subtotal: <span>$124.00</span></p>
              <p>delivery: <span>$00.00</span></p>
              <p>discount: <span>$10.00</span></p>
              <p class="total"><span>total:</span> <span>$134.00</span>
              </p>
              <form>
                <input type="text" placeholder="Coupon Code">
                <button type="submit" class="common_btn">apply</button>
              </form>
              <a class="common_btn mt-4 w-100 text-center" href="check_out.html">checkout</a>
              <a class="common_btn mt-1 w-100 text-center" href="product_grid_view.html"><i class="fab fa-shopify"></i> go
                shop</a>
            </div>
          </div>
        </div>
      </div>
    @endif
  </section>
  @if (count($cartItems) > 0)
    <section id="wsus__single_banner">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <div class="wsus__single_banner_content">
              <div class="wsus__single_banner_img">
                <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
              </div>
              <div class="wsus__single_banner_text">
                <h6>sell on <span>35% off</span></h6>
                <h3>smart watch</h3>
                <a class="shop_btn" href="#">shop now</a>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="wsus__single_banner_content single_banner_2">
              <div class="wsus__single_banner_img">
                <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
              </div>
              <div class="wsus__single_banner_text">
                <h6>New Collection</h6>
                <h3>Cosmetics</h3>
                <a class="shop_btn" href="#">shop now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif
  {{-- CART VIEW PAGE END --}}
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      // product increment
      $('.product-increment').on('click', function() {
        let input = $(this).siblings('.product-qty');
        let quantity = parseInt(input.val()) + 1;
        let rowId = input.data('rowid');
        input.val(quantity);
        $.ajax({
          type: "POST",
          url: "{{ route('cart.update-quantity') }}",
          data: {
            quantity,
            rowId,
          },
          success: function(response) {
            if (response.status === 'success') {
              let productId = '#' + rowId;
              let totalAmount = "{{ $settings->currency_icon }}" +
                response.product_total
              $(productId).text(totalAmount);
              flasher.success(response.message);
            } else if (response.status === 'error') {
              flasher.error(response.message);
            }
          },
          error: function(response) {
            console.log(response);
          }
        });
      })
      // product decrement
      $('.product-decrement').on('click', function() {
        let input = $(this).siblings('.product-qty');
        let quantity = parseInt(input.val()) - 1;
        let rowId = input.data('rowid');
        if (quantity < 1) {
          return;
        }
        input.val(quantity);
        $.ajax({
          type: "POST",
          url: "{{ route('cart.update-quantity') }}",
          data: {
            quantity,
            rowId,
          },
          success: function(response) {
            if (response.status === 'success') {
              let productId = '#' + rowId;
              let totalAmount = "{{ $settings->currency_icon }}" +
                response.product_total
              $(productId).text(totalAmount);
              flasher.success(response.message);
            } else if (response.status === 'error') {
              flasher.error(response.message);
            }
          },
          error: function(response) {
            console.log(response);
          }
        });
      })
      $('.clear_cart').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "This action will clear your cart!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, clear it!"
          })
          .then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                type: "GET",
                url: '{{ route('clear.cart') }}',
                success: function(data) {
                  if (data.status === 'success') {
                    window.location.reload();
                  }
                },
                error: function(xhr, status, error) {
                  console.log(error);
                }
              });
            }
          });
      })
    });
  </script>
@endpush
