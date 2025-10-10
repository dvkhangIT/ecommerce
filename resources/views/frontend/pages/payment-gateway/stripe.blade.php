 <div class="tab-pane fade" id="v-pills-stripe" role="tabpanel" aria-labelledby="v-pills-profile-tab">
   <div class="wsus__payment_area">
     <form action="{{ route('user.stripe.payment') }}" method="POST" id="checkout-form">
       @csrf
       <input type="hidden" name="stripe_token" id="stripe-token-id">
       <div id="card-element" class="form-control"></div>
       <button type="button" id="pay-btn" onclick="createToken()" class="mt-3 nav-link common_btn">Pay with
         stripe</button>
     </form>
   </div>
 </div>
 @php
   $stripeSetting = \App\Models\StripeSetting::first();
 @endphp
 @push('scripts')
   <script src="https://js.stripe.com/v3"></script>
   <script>
     var stripe = Stripe('{{ $stripeSetting->client_id }}');
     var elements = stripe.elements();
     var cardElement = elements.create('card');
     cardElement.mount('#card-element');

     function createToken() {
       document.getElementById("pay-btn").disabled = true;
       stripe.createToken(cardElement).then(function(result) {
         if (typeof result.error != 'undefined') {
           document.getElementById("pay-btn").disabled = false;
           toastr.error(result.error.message);
         }
         // creating token success
         if (typeof result.token != 'undefined') {
           document.getElementById("stripe-token-id").value = result.token.id;
           document.getElementById('checkout-form').submit();
         }
       });
     }
   </script>
 @endpush
