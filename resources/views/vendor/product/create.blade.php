@extends('vendor.layouts.master')
@section('title')
  {{ $settings->site_name }} || Product
@endsection
@section('content')
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user" aria-hidden="true"></i> Products</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form method="POST" action="{{ route('vendor.products.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group wsus__input">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                  </div>
                  <div class="form-group wsus__input">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group wsus__input">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control main-category" name="category">
                          <option value="0">Select</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                              {{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group wsus__input">
                        <label for="inputState">Sub Category</label>
                        <select id="inputState" class="form-control sub-category" name="sub_category">
                          <option value="0">Select</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group wsus__input">
                        <label for="inputState">Child Category</label>
                        <select id="inputState" class="form-control child-category" name="child_category">
                          <option value="0">Select</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group wsus__input">
                    <label for="inputState">Brand</label>
                    <select id="inputState" class="form-control" name="brand">
                      <option value="0">Select</option>
                      @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group wsus__input">
                    <label>SKU</label>
                    <input type="text" class="form-control" name="sku" value="{{ old('sku') }}">
                  </div>
                  <div class="form-group wsus__input">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                  </div>
                  <div class="form-group wsus__input">
                    <label>Offer Price</label>
                    <input type="text" class="form-control" name="offer_price" value="{{ old('offer_price') }}">
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group wsus__input">
                        <label>Offer Start Date</label>
                        <input type="text" class="form-control datepicker" name="offer_start_date"
                          value="{{ old('offer_start_date') }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group wsus__input">
                        <label>Offer End Date</label>
                        <input type="text" class="form-control datepicker" name="offer_end_date"
                          value="{{ old('offer_end_date') }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group wsus__input">
                    <label>Stock Quantity</label>
                    <input type="text" class="form-control" name="qty" value="{{ old('qty') }}">
                  </div>
                  <div class="form-group wsus__input">
                    <label>Video Link</label>
                    <input type="text" class="form-control" name="video_link" value="{{ old('video_link') }}">
                  </div>
                  <div class="form-group wsus__input">
                    <label for="">Short Description</label>
                    <textarea class="form-control summernote" name="short_description" id=""></textarea>
                  </div>
                  <div class="form-group wsus__input">
                    <label for="">Long Description</label>
                    <textarea class="form-control summernote" name="long_description" id=""></textarea>
                  </div>
                  <div class="form-group wsus__input">
                    <label>Seo Title</label>
                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                  </div>
                  <div class="form-group wsus__input">
                    <label>Seo Description</label>
                    <input type="text" class="form-control" name="seo_description"
                      value="{{ old('seo_description') }}">
                  </div>
                  <div class="form-group wsus__input">
                    <label for="inputState">Status</label>
                    <select id="inputState" class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Create</button>
                </form>
              </div>
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
          url: "{{ route('vendor.product.get-subcategories') }}",
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
          url: "{{ route('vendor.product.get-childcategories') }}",
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
