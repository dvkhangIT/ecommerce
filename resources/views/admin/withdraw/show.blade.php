@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Vendor Request</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="section-body">
                <div class="">
                  <div class="invoice-print">
                    <div class="row mt-4">
                      <div class="col-md-12">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <tr>
                              <td><b>Withdraw Method</b></td>
                              <td>{{ $request->method }}</td>
                            </tr>
                            <tr>
                              <td><b>Withdraw Charge</b></td>
                              <td>{{ ($request->withdraw_charge / $request->total_amount) * 100 }}%</td>
                            </tr>
                            <tr>
                              <td><b>Withdraw Charge Amount</b></td>
                              <td>{{ $settings->currency_icon }}{{ $request->withdraw_charge }}</td>
                            </tr>
                            <tr>
                              <td><b>Total Amount</b></td>
                              <td>{{ $settings->currency_icon }}{{ $request->total_amount }}</td>
                            </tr>
                            <tr>
                              <td><b>Withdraw Amount</b></td>
                              <td>{{ $settings->currency_icon }}{{ $request->withdraw_amount }}</td>
                            </tr>
                            <tr>
                              <td><b>Status</b></td>
                              <td>
                                @if ($request->status == 'pending')
                                  <span class="badge bg-warning">Pending</span>
                                @elseif ($request->status == 'paid')
                                  <span class="badge bg-success">Paid</span>
                                @else
                                  <span class="badge bg-danger">Declined</span>
                                @endif
                              </td>
                            </tr>
                            <tr>
                              <td><b>Account Infomation</b></td>
                              <td>{{ $request->account_info }}</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="section-body">
                <div class="">
                  <div class="invoice-print">
                    <div class="row mt-4">
                      <div class="col-md-4">
                        <form action="">
                          <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                              <option value="pending">Pending</option>
                              <option value="paid">Paid</option>
                              <option value="declined">Declined</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                          </div>
                        </form>
                      </div>
                    </div>
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
      $('#order_status').on('change', function() {
        let status = $(this).val();
        let id = $(this).data('id');
        $.ajax({
          type: "GET",
          url: "{{ route('admin.order.status') }}",
          data: {
            status,
            id,
          },
          success: function(data) {
            if (data.status === 'success') {
              toastr.success(data.message);
            }
          },
          error: function(data) {
            console.log(data);
          }
        })
      });

      $('#payment_status').on('change', function() {
        let status = $(this).val();
        let id = $(this).data('id');
        $.ajax({
          type: "GET",
          url: "{{ route('admin.payment.status') }}",
          data: {
            status,
            id,
          },
          success: function(data) {
            if (data.status === 'success') {
              toastr.success(data.message);
            }
          },
          error: function(data) {
            console.log(data);
          }
        });
      })

      $('.print_invoice').on('click', function() {
        let printBody = $('.invoice-print');
        let originalContents = $('body').html();
        $('body').html(printBody.html());
        window.print();
        $('body').html(originalContents);
      });
    });
  </script>
@endpush
