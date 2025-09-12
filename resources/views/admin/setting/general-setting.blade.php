<div class="tab-pane fade active show" id="list-home" role="tabpanel"
  aria-labelledby="list-home-list">
  <div class="card border">
    <div class="card-body">
      <form action="{{ route('admin.general-setting-update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Site Name</label>
          <input type="text" value="{{ @$generalSettings->site_name }}"
            class="form-control" name="site_name">
        </div>
        <div class="form-group">
          <label>Layout</label>
          <select name="layout" class="form-control">
            <option {{ @$generalSettings->layout == 'LTR' ? 'seleted' : '' }}
              value="LTR">LTR</option>
            <option {{ @$generalSettings->layout == 'RTL' ? 'seleted' : '' }}
              value="RTL">RTL</option>
          </select>
        </div>
        <div class="form-group">
          <label>Contact Email</label>
          <input type="text" value="{{ @$generalSettings->contact_email }}"
            class="form-control" name="contact_email">
        </div>
        <div class="form-group">
          <label>Default Currency Name</label>
          <select name="currency_name" class="form-control select2">
            <option value="">Select</option>
            @foreach (config('settings.currency_list') as $currency)
              <option
                {{ @$generalSettings->currency_name == $currency ? 'selected' : '' }}
                value="{{ $currency }}">{{ $currency }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Currency Icon</label>
          <input type="text" value="{{ @$generalSettings->currency_icon }}"
            class="form-control" name="currency_icon">
        </div>
        <div class="form-group">
          <label>Timezone</label>
          <select name="timezone" class="form-control select2">
            <option value="">Select</option>
            @foreach (config('settings.time_zone') as $key => $timeZone)
              <option
                {{ @$generalSettings->time_zone == $key ? 'selected' : '' }}
                value="{{ $key }}">{{ $key }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
