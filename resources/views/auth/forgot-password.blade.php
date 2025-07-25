@extends('frontend.layouts.master')
@section('content')
  <section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h4>forget password</h4>
            <ul>
              <li><a href="#">login</a></li>
              <li><a href="#">forget password</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="wsus__login_register">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 m-auto">
          <div class="wsus__forget_area">
            <span class="qiestion_icon"><i class="fal fa-question-circle"
                aria-hidden="true"></i></span>
            <h4>forget password ?</h4>
            <p>enter the email address to register with <span>e-shop</span></p>
            <div class="wsus__login">
              <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="wsus__login_input">
                  <i class="fal fa-envelope" aria-hidden="true"></i>
                  <input type="email" placeholder="Your Email" name="email"
                    value="{{ old('email') }}">
                </div>
                <button class="common_btn" type="submit">send</button>
              </form>
            </div>
            <a class="see_btn mt-4" href="{{ route('login') }}">go to login</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
