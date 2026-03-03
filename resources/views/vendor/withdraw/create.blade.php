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
              <div class="wsus__dash_pro_area">
                <form method="POST" action="{{ route('vendor.withdraw.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group wsus__input">
                    <label>Preview</label>
                    <img style="display: block" width="200px" src="" alt="">
                    <input type="text" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
