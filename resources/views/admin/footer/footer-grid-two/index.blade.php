@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Footer</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Footer Grid Two</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.footer-grid-two.change-title') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <div class="col-md-4 d-flex">
                    <input type="text" class="form-control" name="title"
                      value="{{ @$footerTitle->footer_grid_two_title }}">
                    <button class="btn btn-primary ml-4">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-header-action">
                  <a href="{{ route('admin.footer-grid-two.create') }}" class="btn btn-primary"><i
                      class="fas fa-plus"></i>
                    Create</a>
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
          type: "PUT",
          url: "{{ route('admin.footer-grid-two.change-status') }}",
          data: {
            status: status,
            id: id
          },
          success: function(data) {
            toastr.success(data.message);
          },
          error: function(xhr, status, errors) {
            console.log(errors);
          }
        });
      })
    });
  </script>
@endpush
