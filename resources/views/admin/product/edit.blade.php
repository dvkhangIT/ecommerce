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
              <h4>Update Product</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.products.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Preview</label>
                  <img style="display: block" width="200px"
                    src="{{ asset($product->thumb_image) }}" alt="">
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name"
                    value="{{ $product->name }}">
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="inputState">Category</label>
                      <select id="inputState" class="form-control main-category"
                        name="category">
                        <option value="0">Select</option>
                        @foreach ($categories as $category)
                          <option
                            {{ $category->id == $product->category_id ? 'selected' : '' }}
                            value="{{ $category->id }}">
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
                        @foreach ($subCategories as $subCategory)
                          <option
                            {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}
                            value="{{ $subCategory->id }}">
                            {{ $subCategory->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="inputState">Child Category</label>
                      <select id="inputState" class="form-control child-category"
                        name="child_category">
                        @foreach ($childCategories as $childCategory)
                          <option
                            {{ $childCategory->id == $product->child_category_id ? 'selected' : '' }}
                            value="{{ $childCategory->id }}">
                            {{ $childCategory->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputState">Brand</label>
                  <select id="inputState" class="form-control" name="brand">
                    <option value="0">Select</option>
                    @foreach ($brands as $brand)
                      <option
                        {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                        value="{{ $brand->id }}">{{ $brand->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>SKU</label>
                  <input type="text" class="form-control" name="sku"
                    value="{{ $product->sku }}">
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" name="price"
                    value="{{ $product->price }}">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Offer Start Date</label>
                      <input type="text" class="form-control datepicker"
                        name="offer_start_date"
                        value="{{ $product->offer_start_date }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Offer End Date</label>
                      <input type="text" class="form-control datepicker"
                        name="offer_end_date"
                        value="{{ $product->offer_end_date }}">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Stock Quantity</label>
                  <input type="text" class="form-control" name="qty"
                    value="{{ $product->qty }}">
                </div>
                <div class="form-group">
                  <label>Video Link</label>
                  <input type="text" class="form-control" name="video_link"
                    value="{{ $product->video_link }}">
                </div>
                <div class="form-group">
                  <label for="">Short Description</label>
                  <textarea class="form-control summernote" name="short_description"
                    id="">{!! $product->short_description !!}</textarea>
                </div>
                <div class="form-group">
                  <label for="">Long Description</label>
                  <textarea class="form-control summernote" name="long_description"
                    id="">{!! $product->long_description !!}</textarea>
                </div>
                <div class="form-group">
                  <label for="inputState">Product Type</label>
                  <select id="inputState" class="form-control"
                    name="product_type">
                    <option value="1">Select</option>
                    <option
                      {{ $product->product_type == 'new_arrival' ? 'selected' : '' }}
                      value="new_arrival">New Arrival</option>
                    <option
                      {{ $product->product_type == 'featured_product' ? 'selected' : '' }}
                      value="featured_product">Featured</option>
                    <option
                      {{ $product->product_type == 'top_product' ? 'selected' : '' }}
                      value="top_product">Top Product</option>
                    <option
                      {{ $product->product_type == 'best_product' ? 'selected' : '' }}
                      value="best_product">Best Product</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Seo Title</label>
                  <input type="text" class="form-control" name="seo_title"
                    value="{{ $product->seo_title }}">
                </div>
                <div class="form-group">
                  <label>Seo Description</label>
                  <textarea class="form-control" name="seo_description" name=""
                    id="">{!! $product->seo_description !!}</textarea>
                </div>
                <div class="form-group">
                  <label for="inputState">Status</label>
                  <select id="inputState" class="form-control" name="status">
                    <option {{ $product->status == 1 ? 'slected' : '' }}
                      value="1">Active</option>
                    <option {{ $product->status == 0 ? 'slected' : '' }}
                      value="0">Inactive</option>
                  </select>
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
        $('.child-category').html('<option value="0">Select</option>');
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
