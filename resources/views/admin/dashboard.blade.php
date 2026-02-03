@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.order.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Today Order</h4>
              </div>
              <div class="card-body">
                {{ $todaysOrder }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.order.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Today Pending Order</h4>
              </div>
              <div class="card-body">
                {{ $todaysPendingOrder }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.order.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Order</h4>
              </div>
              <div class="card-body">
                {{ $totalOrder }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.order.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Pending Order</h4>
              </div>
              <div class="card-body">
                {{ $totalPendingOrder }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.canceled-orders') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Canceled Order</h4>
              </div>
              <div class="card-body">
                {{ $totalCanceledOrder }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.canceled-orders') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Completed Order</h4>
              </div>
              <div class="card-body">
                {{ $totalCompletedOrder }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="javascript:;">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-money-check-alt"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Earnings</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $todayEarnings }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="javascript:;">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-money-check-alt"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>This Month Earnings</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $monthEarnings }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="javascript:;">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-money-check-alt"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>This Year Earnings</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $yearEarnings }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.reviews.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-star"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Reviews</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $totalReviews }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.brand.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-copyright"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Brands</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $totalBrands }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.category.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-list"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Category</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $totalCategories }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.category.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fas fa-list"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Blog</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $totalBlogs }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.subscribers.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fas fa-list"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Subscriber</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $totalSubscriber }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.vendor-list.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fas fa-list"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Vendors</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $totalVendors }}
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin.customer.index') }}">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fas fa-list"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Users</h4>
              </div>
              <div class="card-body">
                {{ $settings->currency_icon }}{{ $totalUsers }}
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
@endsection
s
