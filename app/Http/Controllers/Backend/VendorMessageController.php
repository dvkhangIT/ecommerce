<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VendorMessageController extends Controller
{
    function index(): View
    {
        return view('vendor.messenger.index');
    }
}
