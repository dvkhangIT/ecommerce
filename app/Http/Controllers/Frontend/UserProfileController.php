<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
  public function index()
  {
    return view('frontend.dashboard.profile');
  }
  public function updateProfile(Request $request)
  {
    $request->validate([
      'name' => ['required', 'max:100'],
      'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
      'image' => ['image', 'max:2048']
    ]);
    $user = Auth::user();
    if ($request->file('image')) {
      if (File::exists(public_path($user->image))) {
        File::delete(public_path($user->image));
      }
      $image = $request->image;
      $imageName = rand() . '-' . $image->getClientOriginalName();
      $image->move(public_path('uploads'), $imageName);
      $path = "/uploads/" . $imageName;
      $user->image = $path;
    }
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();
    flasher('Profile Update Successfully', 'success');
    return redirect()->back();
  }
  public function updatePassword(Request $request)
  {
    $request->validate([
      'current_password' => 'required|current_password',
      'password' => 'required|confirmed|min:8'
    ]);
    $request->user()->update([
      'password' => bcrypt($request->password)
    ]);
    flasher('Profile Password Update Successfully', 'success');
    return redirect()->back();
  }
}
