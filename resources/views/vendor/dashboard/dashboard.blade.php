@extends('vendor.layouts.master')
@section('title')
  {{ $settings->site_name }} || Dashboard
@endsection
@section('content')
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                    <i class="far fa-address-book"></i>
                    <p>today's order</p>
                    <h4 style="color: #ffff">{{ $todaysOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                    <i class="far fa-address-book"></i>
                    <p>today's pending order</p>
                    <h4 style="color: #ffff">{{ $todaysPendingOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                    <i class="far fa-address-book"></i>
                    <p>total order</p>
                    <h4 style="color: #ffff">{{ $totalOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                    <i class="far fa-address-book"></i>
                    <p>pending order</p>
                    <h4 style="color: #ffff">{{ $totalPendingOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                    <i class="far fa-address-book"></i>
                    <p>completed order</p>
                    <h4 style="color: #ffff">{{ $totalCompletedOrder }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.products.index') }}">
                    <i class="far fa-address-book"></i>
                    <p>total product</p>
                    <h4 style="color: #ffff">{{ $totalProducts }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="javascript:;">
                    <i class="far fa-address-book"></i>
                    <p>total earnings</p>
                    <h4 style="color: #ffff">{{ $settings->currency_icon }}{{ $todayEarnings }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="javascript:;">
                    <i class="far fa-address-book"></i>
                    <p>this month earnings</p>
                    <h4 style="color: #ffff">{{ $settings->currency_icon }}{{ $monthEarnings }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="djavascript:;">
                    <i class="far fa-address-book"></i>
                    <p>this year earnings</p>
                    <h4 style="color: #ffff">{{ $settings->currency_icon }}{{ $yearEarnings }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="javascript:;">
                    <i class="far fa-address-book"></i>
                    <p>total earnings</p>
                    <h4 style="color: #ffff">{{ $settings->currency_icon }}{{ $totalEarnings }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{ route('vendor.reviews.index') }}">
                    <i class="far fa-address-book"></i>
                    <p>total reviews</p>
                    <h4 style="color: #ffff">{{ $settings->currency_icon }}{{ $totalReviews }}</h4>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a href="{{ route('vendor.shop-profile.index') }}" class="wsus__dashboard_item red">
                    <i class="fas fa-user-shield"></i>
                    <p>profile</p>
                    <h4 style="color: #ffff">-</h4>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
