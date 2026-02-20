<div class="tab-pane fade" id="list-banner-two" role="tabpanel" aria-labelledby="list-banner-two-list">
  <div class="card border">
    <div class="card-body">
      <form action="{{ route('admin.homepage-banner-section-two') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Banner One</h1>
        <div class="form-group">
          <div class="control-label">Status</div>
          <label class="custom-switch mt-2">
            <input type="checkbox" {{ @$homepage_secion_banner_two->banner_one->status == 1 ? 'checked' : '' }}
              name="banner_one_status" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
          </label>
        </div>
        <div class="form-group">
          <img src="{{ asset(@$homepage_secion_banner_two->banner_one->banner_image) }}" width="150px" alt="">
        </div>
        <div class="form-group">
          <label>Banner Image</label>
          <input type="file" class="form-control" name="banner_one_image">
          <input type="hidden" name="banner_one_old_image"
            value="{{ @$homepage_secion_banner_two->banner_one->banner_image }}">
        </div>
        <div class="form-group">
          <label>Banner Url</label>
          <input type="text" value="{{ @$homepage_secion_banner_two->banner_one->banner_url }}" class="form-control"
            name="banner_one_url">
        </div>
        <h1>Banner Two</h1>
        <div class="form-group">
          <div class="control-label">Status</div>
          <label class="custom-switch mt-2">
            <input type="checkbox" {{ @$homepage_secion_banner_two->banner_two->status == 1 ? 'checked' : '' }}
              name="banner_two_status" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
          </label>
        </div>
        <div class="form-group">
          <img src="{{ asset(@$homepage_secion_banner_two->banner_two->banner_image) }}" width="150px" alt="">
        </div>
        <div class="form-group">
          <label>Banner Image</label>
          <input type="file" class="form-control" name="banner_two_image">
          <input type="hidden" name="banner_two_old_image"
            value="{{ @$homepage_secion_banner_two->banner_two->banner_image }}">
        </div>
        <div class="form-group">
          <label>Banner Url</label>
          <input type="text" value="{{ @$homepage_secion_banner_two->banner_two->banner_url }}" class="form-control"
            name="banner_two_url">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
