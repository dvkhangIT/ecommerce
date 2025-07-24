<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request, ProductVariantDataTable $dataTable)
  {
    $product = Product::findOrFail($request->product);
    return $dataTable->render('admin.product.product-variant.index', compact('product'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.product.product-variant.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'product' => 'integer|required',
      'name' => 'required|max:200',
      'status' => 'required'
    ]);
    $variant = new ProductVariant();
    $variant->name = $request->name;
    $variant->status = $request->status;
    $variant->product_id = $request->product;
    $variant->save();
    flasher('Created successfully', 'success');
    return redirect()->route('admin.products-variant.index', ['product' => $request->product]);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $variant = ProductVariant::findOrFail($id);
    return view('admin.product.product-variant.edit', compact('variant'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'name' => 'required|max:200',
      'status' => 'required'
    ]);
    $variant =  ProductVariant::findOrFail($id);
    $variant->name = $request->name;
    $variant->status = $request->status;
    $variant->save();
    flasher('Updated successfully', 'success');
    return redirect()->route('admin.products-variant.index', ['product' => $variant->product_id]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
