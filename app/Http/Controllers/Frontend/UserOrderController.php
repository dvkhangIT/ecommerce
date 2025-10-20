<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UeserOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function index(UeserOrderDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.order.index');
    }
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('frontend.dashboard.order.show', compact('order'));
    }
}
