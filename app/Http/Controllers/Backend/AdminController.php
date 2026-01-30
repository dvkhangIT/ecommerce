<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $todaysOrder = Order::whereDate('created_at', Carbon::today())->count();
        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())
            ->where('order_status', 'pending')
            ->count();
        $totalOrder = Order::count();
        $totalPendingOrder = Order::where('order_status', 'pending')->count();
        $totalCanceledOrder = Order::where('order_status', 'canceled')->count();
        $totalCompletedOrder = Order::where('order_status', 'delivered')->count();
        $todayEarnings = Order::where('order_status', '!=', 'canceled')
            ->whereDate('created_at', Carbon::today())->sum('sub_total');
        $monthEarnings = Order::where('order_status', 'delivered')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('sub_total');
        $yearEarnings = Order::where('order_status', 'delivered')
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('sub_total');
        return view('admin.dashboard', compact(
            'todaysOrder',
            'todaysPendingOrder',
            'totalOrder',
            'totalPendingOrder',
            'totalCanceledOrder',
            'totalCompletedOrder',
            'todayEarnings',
            'monthEarnings',
            'yearEarnings',
        ));
    }

    public function login()
    {
        return view('admin.auth.login');
    }
}
