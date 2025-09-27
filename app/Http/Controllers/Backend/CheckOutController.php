<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingRule;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $addresses = UserAddress::where('user_id', Auth()->user()->id)->get();
        $shippingMethods = ShippingRule::where('status', 1)->get();
        return view('frontend.pages.checkout', compact([
            'addresses',
            'shippingMethods'
        ]));
    }
    public function createAddress(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|max:200|email',
            'phone' => 'required|max:200',
            'country' => 'required|max:200',
            'state' => 'required|max:200',
            'city' => 'required|max:200',
            'zip' => 'required|max:200',
            'address' => 'required|max:200',
        ]);
        $address = new UserAddress();
        $address->user_id = Auth::user()->id;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
        $address->save();
        toastr()->success('Address created Successffuly!', ' ');

        return redirect()->back();
    }
}
