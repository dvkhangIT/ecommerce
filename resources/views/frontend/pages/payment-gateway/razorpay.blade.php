  <div class="tab-pane fade" id="v-pills-razorpay" role="tabpanel" aria-labelledby="v-pills-razorpay-tab">
    <div class="row">
      <div class="col-xl-12 m-auto">
        <div class="wsus__payment_area">
          @php
            $razorpaySetting = \App\Models\RazorpaySetting::first();
            $total = getFinalPayableAmount();
            $payableAmount = round($total * $razorpaySetting->currency_rate, 2);
          @endphp
          <form action="{{ route('user.razorpay.payment') }}" method="POST">
            @csrf
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ $razorpaySetting->razorpay_key }}"
              data-amount="{{ intval($payableAmount * 100) }}" data-currency="INR" data-buttontext="Pay with Razorpay"
              data-name="Test Payment" data-description="Payment for Order" data-prefill.name="{{ Auth::user()->name }}"
              data-prefill.email="{{ Auth::user()->email }}" data-theme.color="#F37254"></script>
          </form>
        </div>
      </div>
    </div>
  </div>
