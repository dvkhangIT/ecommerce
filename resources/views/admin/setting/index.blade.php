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
                      <a class="list-group-item list-group-item-action active show" id="list-home-list" data-toggle="list"
                        href="#list-home" role="tab" aria-selected="false">General Setting</a>
                      <a class="list-group-item list-group-item-action" id="email-configuration-list" data-toggle="list"
                        href="#email-configuration" role="tab" aria-selected="false">Email Configuration</a>
                      <a class="list-group-item list-group-item-action" id="list-logo-list" data-toggle="list"
                        href="#list-logo" role="tab" aria-selected="false">Logo and Favicon</a>
                    </div>
                  </div>
                  <div class="col-10">
                    <div class="tab-content" id="nav-tabContent">
                      @include('admin.setting.general-setting')
                      @include('admin.setting.email-configuration')
                      @include('admin.setting.logo')
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
