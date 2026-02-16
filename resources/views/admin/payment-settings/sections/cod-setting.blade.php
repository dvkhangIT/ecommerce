<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
  <div class="form-group">
    <div class="card-body">
      <div class="card-boder">
        <form action="{{ route('admin.code-setting.update', 1) }}" method="POST" action="">
          @csrf
          @method('put')
          <div class="form-group">
            <label>COD Status</label>
            <select name="status" class="form-control">
              <option {{ $codSetting->status === 1 ? 'selected' : '' }} value="1">Enable</option>
              <option {{ $codSetting->status === 0 ? 'selected' : '' }} value="0">Disable</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
