<div class="tab-pane fade active show" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
  <div class="card border">
    <div class="card-body">
      <form action="{{ route('admin.general-setting-update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Paypal Status</label>
          <select name="layout" class="form-control">
            <option value="1">Enable</option>
            <option value="0">Disable</option>
          </select>
        </div>
        <div class="form-group">
          <label>Account Mode</label>
          <select name="layout" class="form-control">
            <option value="0">Sandbox</option>
            <option value="1">Live</option>
          </select>
        </div>
        <div class="form-group">
          <label>Contry Name</label>
          <select name="layout" class="form-control select2">
            <option value="">Select</option>
            @foreach (config('settings.country_list') as $country)
              <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Currency Name</label>
          <select name="layout" class="form-control select2">
            <option value="">Select</option>
            @foreach (config('settings.currency_list') as $key => $currency)
              <option value="{{ $currency }}">{{ $key }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Currency rate (Per USD)</label>
          <input type="text" value="" class="form-control" name="currency_rate">
        </div>
        <div class="form-group">
          <label>Paypal Client Id</label>
          <input type="text" value="" class="form-control" name="client_id">
        </div>
        <div class="form-group">
          <label>Paypal Secret Key</label>
          <input type="text" value="" class="form-control" name="secret_key">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
