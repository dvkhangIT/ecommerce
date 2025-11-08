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
                      <a class="list-group-item list-group-item-action active show" id="list-banner-one-list"
                        data-toggle="list" href="#list-banner-one" role="tab" aria-selected="false">Homepage banner
                        section one</a>
                      <a class="list-group-item list-group-item-action" id="list-banner-two-list" data-toggle="list"
                        href="#list-banner-two" role="tab" aria-selected="false">Homepage banner section two</a>
                      <a class="list-group-item list-group-item-action" id="list-banner-three-list" data-toggle="list"
                        href="#list-banner-three" role="tab" aria-selected="false">Homepage banner section three</a>
                      <a class="list-group-item list-group-item-action" id="list-banner-four-list" data-toggle="list"
                        href="#list-banner-four" role="tab" aria-selected="true">Homepage banner section four</a>
                    </div>
                  </div>
                  <div class="col-10">
                    <div class="tab-content" id="nav-tabContent">
                      @include('admin.advertisement.homepage-banner-one')
                      @include('admin.advertisement.homepage-banner-two')
                      @include('admin.advertisement.homepage-banner-three')
                      @include('admin.advertisement.homepage-banner-four')
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
