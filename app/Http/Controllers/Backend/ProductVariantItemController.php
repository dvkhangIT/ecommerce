<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
  public function index(ProductVariantItemDataTable $dataTables, $productId, $variantId)
  {
    $product = Product::findOrFail($productId);
    $variant = ProductVariant::findOrFail($variantId);
    return $dataTables->render('admin.product.product-variant-item.index', compact('product', 'variant'));
  }
  public function create(string $productId, string $variantId)
  {
    $variant = ProductVariant::findOrFail($variantId);
    $product = Product::findOrFail($productId);
    return view('admin.product.product-variant-item.create', compact('variant', 'product'));
  }
  public function store(Request $request)
  {
    $request->validate([
      "name" => "required|max:200",
      "variant_id" => "integer|required",
      "price" => "integer|required",
      "is_default" => "required",
      "status" => "required",
    ]);
    $variantItem = new ProductVariantItem();
    $variantItem->name = $request->name;
    $variantItem->price = $request->price;
    $variantItem->product_variant_id = $request->variant_id;
    $variantItem->status = $request->status;
    $variantItem->is_default = $request->is_default;
    $variantItem->save();
    flasher('Created successfully!', 'success');
    return redirect()->route('admin.products-variant-item.index', [
      'productId' => $request->product_id,
      'variantId' => $request->variant_id
    ]);
  }
  public function edit(string $variantItemId)
  {
    $variantItem = ProductVariantItem::findOrFail($variantItemId);
    return view('admin.product.product-variant-item.edit', compact('variantItem'));
  }
  public function update(Request $request, string $variantItemId)
  {
    $request->validate([
      "name" => "required|max:200",
      "price" => "integer|required",
      "is_default" => "required",
      "status" => "required",
    ]);
    $variantItem = ProductVariantItem::findOrFail($variantItemId);
    $variantItem->name = $request->name;
    $variantItem->price = $request->price;
    $variantItem->status = $request->status;
    $variantItem->is_default = $request->is_default;
    $variantItem->save();
    flasher('Updated successfully!', 'success');
    return redirect()->route('admin.products-variant-item.index', [
      'productId' => $variantItem->productVariant->product_id,
      'variantId' => $variantItem->product_variant_id
    ]);
  }
}
