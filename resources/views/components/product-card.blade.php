 <div class="col-xl-3 col-sm-6 col-lg-4">
   <div class="wsus__product_item">
     <span class="wsus__new">{{ productType($product->product_type) }}</span>
     @if (checkDiscount($product))
       <span class="wsus__minus">-{{ calculateDiscountPercent($product->price, $product->offer_price) }}%
       </span>
     @endif
     <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
       <img src="{{ asset($product->thumb_image) }}" alt="product" class="img-fluid w-100 img_1" />
       <img
         src="{{ isset($product->productImageGalleries[0]->image) ? asset($product->productImageGalleries[0]->image) : asset($product->thumb_image) }}"
         alt="product" class="img-fluid w-100 img_2" />
     </a>
     <ul class="wsus__single_pro_icon">
       <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="show_product_modal"
           data-id="{{ $product->id }}"><i class="far fa-eye"></i></a>
       </li>
       <li><a class="add_to_wishlist" data-id="{{ $product->id }}" href="#"><i class="far fa-heart"></i></a>
       </li>
     </ul>
     <div class="wsus__product_details">
       <a class="wsus__category" href="#">{{ $product->category->name }}
       </a>
       <p class="wsus__pro_rating">
         @php
           $avgRating = $product->reviews()->avg('rating');
           $fullRating = round($avgRating);
         @endphp
         @for ($i = 1; $i <= 5; $i++)
           @if ($i <= $fullRating)
             <i class="fas fa-star"></i>
           @else
             <i class="far fa-star"></i>
           @endif
         @endfor
         <span>({{ count($product->reviews) }} review)</span>
       </p>
       <a class="wsus__pro_name"
         href="{{ route('product-detail', $product->slug) }}">{{ limitText($product->name, 52) }}</a>
       @if (checkDiscount($product))
         <p class="wsus__price">
           {{ $settings->currency_icon }}{{ $product->offer_price }}
           <del>{{ $settings->currency_icon }}{{ $product->price }}</del>
         </p>
       @else
         <p class="wsus__price">${{ $product->price }}</p>
       @endif
       <form action=""class="shopping-cart-form">
         <input type="hidden" value="{{ $product->id }}" name="product_id">
         @foreach ($product->variants as $variant)
           <div class="col-xl-6 col-sm-6">
             <select class="d-none" name="variants_items[]">
               @foreach ($variant->productVariantItems as $variantItem)
                 <option value="{{ $variantItem->id }}" {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                   {{ $variantItem->name }}
                   ({{ $settings->currency_icon }}{{ $variantItem->price }})
                 </option>
               @endforeach
             </select>
           </div>
         @endforeach
         <input name="qty" type="hidden" min="1" max="100" value="1" />
         <button type="submit" class="add_cart border-0">add to cart</button>
       </form>
     </div>
   </div>
 </div>
