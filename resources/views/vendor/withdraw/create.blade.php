@extends('vendor.layouts.master')
@section('title')
  {{ $settings->site_name }} || Create Withdraw Request
@endsection
@section('content')
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user" aria-hidden="true"></i>Create Withdraw Request</h3>
            <div class="wsus__dashboard_profile">
              <div class="row">
                <div class="wsus__dash_pro_area col-md-6">
                  <form method="POST" action="{{ route('vendor.withdraw.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group wsus__input">
                      <label>Method</label>
                      <select type="text" class="form-control" name="method" id="method">
                        <option value="">Select</option>
                        @foreach ($methods as $method)
                          <option value="{{ $method->id }}">{{ $method->name }}</option>
                        @endforeach
                        <select>
                    </div>
                    <div class="form-group wsus__input">
                      <label>Withdraw Amount</label>
                      <input type="text" class="form-control" name="amount">
                    </div>
                    <div class="form-group wsus__input">
                      <label>Account Infomation</label>
                      <textarea type="text" class="form-control" name="account_info"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
                <div class="wsus__dash_pro_area col-md-6 account_info_area ml-2">
                </div>
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
    $(document).ready(function() {
      $('#method').on('change', function(e) {
        let id = $(this).val();
        $.ajax({
          method: 'get',
          url: "{{ route('vendor.withdraw.show', ':id') }}".replace(':id', id),
          success: function(response) {
            $('.account_info_area').html(`
            <h3>Payout Range: ${response.minimum_amount} - ${response.maximum_amount}</h3>
            <h3>Withdraw Charge: ${response.withdraw_charge}%</h3>
            <p>${response.description}</p>
        `)
          },
          error: function(error) {
            console.log(error);
          }
        });
      })
    });
  </script>
@endpush
