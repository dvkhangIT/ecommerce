@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Product Variant</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Variant</h4>
            </div>
            <div class="card-body">
              <form
                action="{{ route('admin.products-variant.update', $variant->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="product"
                  value="{{ request()->product }}">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name"
                    value="{{ $variant->name }}">
                </div>
                <div class="form-group">
                  <label for="inputState">Status</label>
                  <select id="inputState" class="form-control" name="status">
                    <option {{ $variant->status == 1 ? 'selected' : '' }}
                      value="1">Active</option>
                    <option {{ $variant->status == 0 ? 'selected' : '' }}
                      value="0">Inactive</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
