@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Setttings</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-2">
                    <div class="list-group" id="list-tab" role="tablist">
                      <a class="list-group-item list-group-item-action active show" id="list-profile-list"
                        data-toggle="list" href="#list-profile" role="tab" aria-selected="false">Popular Category
                        Section</a>
                      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                        href="#list-messages" role="tab" aria-selected="false">Product Slider Section One</a>
                      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                        href="#list-settings" role="tab" aria-selected="true">Product Slider Section Two</a>
                      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                        href="#slider-section-three" role="tab" aria-selected="true">Product Slider Section Three</a>
                    </div>
                  </div>
                  <div class="col-10">
                    <div class="tab-content" id="nav-tabContent">
                      @include('admin.home-page-setting.section.popular-category-section')
                      @include('admin.home-page-setting.section.product-slider-section-one')
                      @include('admin.home-page-setting.section.product-slider-section-two')
                      @include('admin.home-page-setting.section.product-slider-section-three')
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
@endsection
