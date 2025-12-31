@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Blogs</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Blog</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <img src="{{ asset($blog->image) }}" alt="" width="200px">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title', $blog->title) }}">
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="inputState">Category</label>
                      <select id="inputState" class="form-control main-category" name="category">
                        <option value="0">Select</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}"
                            {{ $blog->category_id === $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control summernote" name="description" id="">{!! $blog->description !!}</textarea>
                </div>
                <div class="form-group">
                  <label>Seo Title</label>
                  <input type="text" class="form-control" name="seo_title"
                    value="{{ old('seo_title', $blog->seo_title) }}">
                </div>
                <div class="form-group">
                  <label>Seo Description</label>
                  <input type="text" class="form-control" name="seo_description"
                    value="{{ old('seo_description', $blog->seo_description) }}">
                </div>
                <div class="form-group">
                  <label for="inputState">Status</label>
                  <select id="inputState" class="form-control" name="status">
                    <option {{ $blog->status === 1 ? 'selected' : '' }} value="1">Active</option>
                    <option {{ $blog->status === 0 ? 'selected' : '' }} value="0">Inactive</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Uupdate</button>
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
