@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Product Variant Items</h1>
    </div>
    <div class="mb-3">
      <a href="{{ route('admin.products-variant.index', ['product' => $product->id]) }}"
        class="btn btn-primary">Back</a>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Variant: {{ $variant->name }}</h4>
              <div class="card-header-action">
                <a href="{{ route('admin.products-variant-item.create', ['productId' => $product->id, 'variantId' => $variant->id]) }}"
                  class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
              </div>
            </div>
            <div class="card-body">
              {{ $dataTable->table() }}
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
          method: "PUT",
          url: "{{ route('admin.products-variant.change-status') }}",
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
      }) d
    });
  </script>
@endpush
