@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Flash Sale</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Flash Sale End Date</h4>
            </div>
            <div class="card-body">
              <form action="">
                <div class="">
                  <div class="form-group">
                    <label>Sale End Date</label>
                    <input type="text" class="form-control datepicker"
                      name="end_date" value="">
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Add Flash Sale Products</h4>
            </div>
            <div class="card-body">
              <form action="">
                <div class="">
                  <div class="form-group">
                    <label>Sale End Date</label>
                    <select name="" class="form-control select2"
                      id="">
                      <option value="">test 1</option>
                      <option value="">test 2</option>
                      <option value="">test 3</option>
                    </select>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All Flash Sale Products</h4>
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
          url: "{{ route('admin.products.change-status') }}",
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
