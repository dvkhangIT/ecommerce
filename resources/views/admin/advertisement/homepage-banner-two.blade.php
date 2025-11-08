<div class="tab-pane fade" id="list-banner-two" role="tabpanel" aria-labelledby="list-banner-two-list">
  <div class="card border">
    <div class="card-body">
      <form action="{{ route('admin.general-setting-update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Site Name</label>
          <input type="text" value="" class="form-control" name="site_name">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
