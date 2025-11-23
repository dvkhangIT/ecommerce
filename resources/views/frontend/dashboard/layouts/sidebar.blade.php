<div class="dashboard_sidebar">
  <span class="close_icon">
    <i class="far fa-bars dash_bar"></i>
    <i class="far fa-times dash_close"></i>
  </span>
  <a href="{{ route('user.dashboard') }}" class="dash_logo"><img src="{{ asset('frontend/images/logo.png') }}"
      alt="logo" class="img-fluid" /></a>
  <ul class="dashboard_link">
    <li>
      <a class="{{ setActive(['user.dashboard']) }}" href="{{ route('user.dashboard') }}"><i
          class="fas fa-tachometer"></i>Dashboard</a>
    </li>
    @if (auth()->user()->role === 'vendor')
      <li>
        <a class="{{ setActive(['vendor.dashboard']) }}" href="{{ route('vendor.dashboard') }}"><i
            class="fas fa-tachometer"></i>Go to Vendor Dashboard</a>
      </li>
    @endif
    <li>
      <a class="{{ setActive(['user.orders.index']) }}" href="{{ route('user.orders.index') }}"><i
          class="fas fa-list-ul"></i> Orders</a>
    </li>
    <li>
      <a class="{{ setActive(['user.review.index']) }}" href="{{ route('user.review.index') }}"><i
          class="far fa-star"></i> Reviews</a>
    </li>
    <li>
      <a href="dsahboard_wishlist.html"><i class="far fa-heart"></i>
        Wishlist</a>
    </li>
    <li>
      <a class="{{ setActive(['user.profile']) }}" href="{{ route('user.profile') }}"><i class="far fa-user"></i> My
        Profile</a>
    </li>
    @if (auth()->user()->role !== 'vendor')
      <li>
        <a class="{{ setActive(['user.vendor-request.index']) }}" href="{{ route('user.vendor-request.index') }}"><i
            class="far fa-user"></i>
          Request to be a vendor</a>
      </li>
    @endif
    <li>
      <a class="{{ setActive(['user.address.index']) }}" href="{{ route('user.address.index') }}"><i
          class="fal fa-gift-card"></i>
        Addresses</a>
    </li>
    <li>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
          this.closest('form').submit();">
          <i class="far fa-sign-out-alt"></i> Log
      </form>
      out</a>
    </li>
  </ul>
</div>
