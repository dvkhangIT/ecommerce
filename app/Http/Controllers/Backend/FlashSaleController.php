<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
  public function index(FlashSaleItemDataTable $dataTable)
  {
    $flashSaleDate = FlashSale::first();
    $products = Product::where('is_approved', 1)
      ->where('status', 1)
      ->orderBy('id', 'DESC')
      ->get();
    return $dataTable->render('admin.product.flash-sale.index', compact('flashSaleDate', 'products'));
  }
  public function update(Request $request)
  {
    $request->validate([
      'end_date' => ['required']
    ]);
    FlashSale::updateOrCreate(
      ['id' => 1],
      ['end_date' => $request->end_date]
    );
    flasher('Updated Successfully!');
    return redirect()->back();
  }
  public function addProduct(Request $request)
  {
    $request->validate([
      'product' => ['required'],
      'status' => ['required'],
      'show_at_home' => ['required']
    ]);
    $flashSaleDate = FlashSale::first();
    $flashSaleItem = new FlashSaleItem();
    $flashSaleItem->product_id = $request->product;
    $flashSaleItem->flash_sale_id = $flashSaleDate->id;
    $flashSaleItem->show_at_home = $request->show_at_home;
    $flashSaleItem->status = $request->status;
    $flashSaleItem->save();
    flasher('Product Added Successfully!');
    return redirect()->back();
  }
}
