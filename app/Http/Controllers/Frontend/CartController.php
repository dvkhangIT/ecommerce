<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartDetails()
    {
        $cartItems = Cart::content();
        if (count($cartItems) === 0) {
            Session::forget('coupon');
        }
        return view('frontend.pages.cart-detail', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        // Check product quantity
        if ($product->qty === 0) {
            return response(['status' => 'error', 'message' => 'Product stock out!']);
        } elseif ($product->qty < $request->qty) {
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock!']);
        }
        $variants = [];
        $variantTotalAmount = 0;
        if ($request->has('variants_items')) {
            foreach ($request->variants_items as $item_id) {
                $variantItem = ProductVariantItem::findOrFail($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }
        // check discount
        $productPrice = 0;
        if (checkDiscount($product)) {
            $productPrice = $product->offer_price;
        } else {
            $productPrice = $product->price;
        }
        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;
        Cart::add($cartData);

        return response([
            'status' => 'success',
            'message' => 'Added to cart successflly',
        ]);
    }
    public function updateProductQuantity(Request $request)
    {
        $prodcutId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($prodcutId);
        // Check product quantity
        if ($product->quantity === 0) {
            return response(['status' => 'error', 'message' => 'Product stock out!']);
        } elseif ($product->qty < $request->quantity) {
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock!']);
        }
        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);
        return response([
            'status' => 'success',
            'message' => 'Product quantity updated!',
            'product_total' => $productTotal,
        ]);
    }
    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;
        return $total;
    }
    public function cartTotal()
    {
        $total = 0;
        foreach (Cart::content() as $product) {
            $total += $this->getProductTotal($product->rowId);
        }
        return $total;
    }
    public function clearCart()
    {
        Cart::destroy();
        return response(['status' => 'success', 'message' => 'Cart cleared successflly!']);
    }
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        toastr()->success('Product removed successflly!', ' ');
        return redirect()->back();
    }
    public function getCartCount()
    {
        return Cart::content()->count();
    }
    public function getCartProducts()
    {
        return Cart::content();
    }
    public function removeSidbarProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return response(['status' => 'success', 'message' => 'Product removed successflly!']);
    }
    public function applyCoupon(Request $request)
    {
        if ($request->coupon_code === null) {
            return response(['status' => 'error', 'message' => 'Coupon filed is required!']);
        }
        $coupon = Coupon::where(['status' => 1, 'code' => $request->coupon_code])->first();
        if ($coupon === null) {
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        } elseif ($coupon->start_date < date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        } elseif ($coupon->end_date < date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'Coupon expired!']);
        } elseif ($coupon->total_used >= $coupon->quantity) {
            return response(['status' => 'error', 'message' => 'You can not apply this coupon!']);
        }
        if ($coupon->discount_type === 'amount') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount,
            ]);
        } elseif ($coupon->discount_type === 'percent') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount,
            ]);
        }
        return response(['status' => 'success', 'message' => 'Coupon applied successflly!']);
    }
    public function couponCalculation()
    {
        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            if ($coupon['discount_type'] === 'amount') {
                $total = $subTotal - $coupon['discount'];
                return response([
                    'status' => 'success',
                    'cart_total' => $total,
                    'discount' => $coupon['discount']
                ]);
            } elseif ($coupon['discount_type'] === 'percent') {
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = $subTotal - $discount;
                return response([
                    'status' => 'success',
                    'cart_total' => $total,
                    'discount' => $discount
                ]);
            }
        } else {
            $total = getCartTotal();
            return response([
                'status' => 'success',
                'cart_total' => $total,
                'discount' => 0,
            ]);
        }
    }
}
