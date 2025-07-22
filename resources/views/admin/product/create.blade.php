@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Product</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Product</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.slider.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Banner</label>
                  <input type="file" class="form-control" name="banner">
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name"
                    value="{{ old('name') }}">
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="inputState">Category</label>
                      <select id="inputState" class="form-control main-category"
                        name="category">
                        <option value="0">Select</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">
                            {{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="inputState">Sub Category</label>
                      <select id="inputState" class="form-control sub-category"
                        name="sub_category">
                        <option value="0">Select</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="inputState">Child Category</label>
                      <select id="inputState" class="form-control child-category"
                        name="child_category">
                        <option value="0">Select</option>
                      </select>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
  <script>
    // Get sub category
    $(document).ready(function() {
      $('body').on('change', '.main-category', function(e) {
        let id = $(this).val();
        $.ajax({
          type: "GET",
          url: "{{ route('admin.product.get-subcategories') }}",
          data: {
            id: id
          },
          success: function(data) {
            $('.sub-category').html(
              '<option value="0">Select</option>');
            $.each(data, function(i, item) {
              $('.sub-category').append(
                `<option value="${item.id}">${item.name}</option>`
              );
            })
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      })
    });
    // Get child category
    $(document).ready(function() {
      $('body').on('change', '.sub-category', function(e) {
        let id = $(this).val();
        $.ajax({
          type: "GET",
          url: "{{ route('admin.product.get-childcategories') }}",
          data: {
            id: id
          },
          success: function(data) {
            $('.child-category').html(
              '<option value="0">Select</option>');
            $.each(data, function(i, item) {
              $('.child-category').append(
                `<option value="${item.id}">${item.name}</option>`
              )
            })
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      })
    });
  </script>
@endpush
