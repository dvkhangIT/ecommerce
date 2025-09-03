@extends('vendor.layouts.master')
@section('content')
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <a class="btn btn-warning mb-4"
            href="{{ route('vendor.products.index') }}"><i
              class="fas fa-arrow-left"></i> Back</a>
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user" aria-hidden="true"></i> Product Variant</h3>
            <h6>Variant: {{ $variant->name }}</h6>
            <div class="create_button">
              <a href="{{ route('vendor.products-variant-item.create', ['productId' => $product->id, 'variantId' => $variant->id]) }}"
                class="btn btn-primary"><i class="fas fa-plus"></i>
                Create Variant Item</a>
            </div>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                {{ $dataTable->table() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
  <script>
    $(document).ready(function() {
      $('body').on('click', '.change-status', function() {
        let status = $(this).is(':checked');
        let id = $(this).data('id');
        $.ajax({
          type: "PUT",
          url: "{{ route('vendor.products-variant-item.change-status') }}",
          data: {
            status: status,
            id: id
          },
          success: function(data) {
            flasher.success(data.message);
          },
          error: function(xhr, status, errors) {
            console.log(errors);
          }
        });
      })
    });
  </script>
@endpush
