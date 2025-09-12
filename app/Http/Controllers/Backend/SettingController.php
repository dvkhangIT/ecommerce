<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
  public function index()
  {
    $generalSettings = GeneralSetting::first();
    return view('admin.setting.index', compact('generalSettings'));
  }
  public function generalSettingUpdate(Request $request)
  {
    $request->validate([
      'site_name' => ['required', 'max:200'],
      'layout' => ['required', 'max:200'],
      'contact_email' => ['required', 'max:200'],
      'currency_name' =>  ['required', 'max:200'],
      'currency_icon' =>  ['required', 'max:200'],
      'timezone' =>  ['required', 'max:200'],
    ]);
    GeneralSetting::updateOrCreate(
      ['id' => 1],
      [
        'layout' => $request->layout,
        'site_name' => $request->site_name,
        'contact_email' => $request->contact_email,
        'currency_name' => $request->currency_name,
        'currency_icon' => $request->currency_icon,
        'time_zone' => $request->timezone
      ]
    );
    flasher('Update Successfully', 'success');
    return redirect()->back();
  }
}
