<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
  public function index(ProductVariantItemDataTable $dataTables, $productId, $variantId)
  {
    $product = Product::findOrFail($productId);
    $variant = ProductVariant::findOrFail($variantId);
    return $dataTables->render('admin.product.product-variant-item.index', compact('product', 'variant'));
  }
}
