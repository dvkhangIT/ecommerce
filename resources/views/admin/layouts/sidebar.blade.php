  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}">{{ $settings->site_name }}</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">||</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown {{ setActive(['admin.dashboard']) }}">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="fas fa-fire"></i>
            <span>Dashboard</span></a>
        </li>
        <li class="menu-header">Ecommerce</li>
        <li class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
            <span>Manage Category</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.category.*']) }}">
              <a class="nav-link" href="{{ route('admin.category.index') }}">Category</a>
            </li>
            <li class="{{ setActive(['admin.sub-category.*']) }}">
              <a class="nav-link" href="{{ route('admin.sub-category.index') }}">Sub
                Category</a>
            </li>
            <li class="{{ setActive(['admin.child-category.*']) }}">
              <a class="nav-link" href="{{ route('admin.child-category.index') }}">Child
                Category</a>
            </li>
          </ul>
        </li>
        <li
          class="dropdown {{ setActive([
              'admin.brand.*',
              'admin.products.*',
              'admin.products-image-gallery.*',
              'admin.products-variant.*',
              'admin.products-variant-item.*',
              'admin.seller-pending-products.*',
              'admin.seller-products.*',
          ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-box"></i>
            <span>Manage Product</span></a>
          <ul class="dropdown-menu">
            <li class=" {{ setActive(['admin.brand.index']) }}">
              <a class="nav-link" href="{{ route('admin.brand.index') }}">Brands</a>
            </li>
            <li
              class=" {{ setActive([
                  'admin.products.*',
                  'admin.products.index',
                  'admin.products-image-gallery.*',
                  'admin.products-variant.*',
                  'admin.products-variant-item.*',
                  'admin.reviews.index.*',
              ]) }}">
              <a class="nav-link" href="{{ route('admin.products.index') }}">Products</a>
            </li>
            <li class=" {{ setActive(['admin.seller-products.*']) }}">
              <a class="nav-link" href="{{ route('admin.seller-products.index') }}">Seller
                Products</a>
            </li>
            <li class="{{ setActive(['admin.seller-pending-products.*']) }}">
              <a class="nav-link" href="{{ route('admin.seller-pending-products.index') }}">Seller
                Pending Products</a>
            </li>
            <li class="{{ setActive(['admin.reviews.index.*']) }}">
              <a class="nav-link" href="{{ route('admin.reviews.index') }}">Product Review</a>
            </li>
          </ul>
        </li>
        <li
          class="dropdown {{ setActive([
              'admin.order.*',
              'admin.pending-orders',
              'admin.processed-orders',
              'admin.dropped-off-orders',
              'admin.shipped-orders',
              'admin.out-for-delivery-orders',
              'admin.delivered-orders',
              'admin.canceled-orders',
          ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-cart-plus"></i>
            <span>Orders</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.order.index']) }}">
              <a class="nav-link" href="{{ route('admin.order.index') }}">All Orders</a>
            </li>
            <li class="{{ setActive(['admin.pending-orders']) }}">
              <a class="nav-link" href="{{ route('admin.pending-orders') }}">Pending Orders</a>
            </li>
            <li class="{{ setActive(['admin.processed-orders']) }}">
              <a class="nav-link" href="{{ route('admin.processed-orders') }}">Processed Orders</a>
            </li>
            <li class="{{ setActive(['admin.dropped-off-orders']) }}">
              <a class="nav-link" href="{{ route('admin.dropped-off-orders') }}">Dropped Off Orders</a>
            </li>
            <li class="{{ setActive(['admin.shipped-order']) }}">
              <a class="nav-link" href="{{ route('admin.shipped-orders') }}">Shipped Off Orders</a>
            </li>
            <li class="{{ setActive(['admin.out-for-delivery-orders']) }}">
              <a class="nav-link" href="{{ route('admin.out-for-delivery-orders') }}">Out ForDelivery Orders</a>
            </li>
            <li class="{{ setActive(['admin.delivered-orders']) }}">
              <a class="nav-link" href="{{ route('admin.delivered-orders') }}">Delivered Orders</a>
            </li>
            <li class="{{ setActive(['admin.canceled-orders']) }}">
              <a class="nav-link" href="{{ route('admin.canceled-orders') }}">Canceled Orders</a>
            </li>
          </ul>
        </li>
        <li class="{{ setActive(['admin.transaction']) }}"><a class="nav-link"
            href="{{ route('admin.transaction') }}">
            <i class="fas fa-money-bill"></i>
            <span>Transactions
            </span></a></li>
        <li
          class="dropdown {{ setActive(['admin.vendor-profile.*', 'admin.flash-sale.*', 'admin.coupons.*', 'admin.shipping-rule.*', 'admin.payment-settings.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
            <span>Ecommerce</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.flash-sale.*']) }}">
              <a class="nav-link" href="{{ route('admin.flash-sale.index') }}">Flash Sale</a>
            </li>
            <li class="{{ setActive(['admin.coupons.*']) }}">
              <a class="nav-link" href="{{ route('admin.coupons.index') }}">Coupons</a>
            </li>
            <li class="{{ setActive(['admin.shipping-rule.*']) }}">
              <a class="nav-link" href="{{ route('admin.shipping-rule.index') }}">Shipping
                Rule</a>
            </li>
            <li class="{{ setActive(['admin.vendor-profile.*']) }}">
              <a class="nav-link" href="{{ route('admin.vendor-profile.index') }}">Vendor
                Profile</a>
            </li>
            <li class="{{ setActive(['admin.payment-settings.*']) }}">
              <a class="nav-link" href="{{ route('admin.payment-settings.index') }}">Payment Settings</a>
            </li>
          </ul>
        </li>
        <li
          class="dropdown {{ setActive(['admin.slider.*', 'admin.home-page-setting', 'admin.vendor-condition.index', 'admin.about.index', 'admin.terms.index']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-cog"></i>
            <span>Manage Website</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.slider.*']) }}">
              <a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a>
            </li>
            <li class="{{ setActive(['admin.home-page-setting']) }}">
              <a class="nav-link" href="{{ route('admin.home-page-setting') }}">Home Page Setting</a>
            </li>
            <li class="{{ setActive(['admin.vendor-condition.index']) }}">
              <a class="nav-link" href="{{ route('admin.vendor-condition.index') }}">Vendor Condition</a>
            </li>
            <li class="{{ setActive(['admin.about.index']) }}">
              <a class="nav-link" href="{{ route('admin.about.index') }}">About Page</a>
            </li>
            <li class="{{ setActive(['admin.terms.index']) }}">
              <a class="nav-link" href="{{ route('admin.terms.index') }}">Terms Page</a>
            </li>
          </ul>
        </li>
        <li class="{{ setActive(['admin.advertisement.*']) }}"><a class="nav-link"
            href="{{ route('admin.advertisement.index') }}">
            <i class="fas fa-ad"></i>
            <span>Advertisement</span></a>
        </li>
        <li class="dropdown {{ setActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-comments.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
            <span>Manage Blog</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.blog-category.*']) }}">
              <a class="nav-link" href="{{ route('admin.blog-category.index') }}">Categories</a>
            </li>
            <li class="{{ setActive(['admin.blog.*']) }}">
              <a class="nav-link" href="{{ route('admin.blog.index') }}">Blog</a>
            </li>
            <li class="{{ setActive(['admin.blog-comments.index']) }}">
              <a class="nav-link" href="{{ route('admin.blog-comments.index') }}">Blog Comment</a>
            </li>
          </ul>
        </li>
        <li class="dropdown {{ setActive(['admin.withdraw-method.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
            <span>Withdraw Payment</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.withdraw-method.*']) }}">
              <a class="nav-link" href="{{ route('admin.withdraw-method.index') }}">Withdraw Method</a>
            </li>
            <li class="{{ setActive(['admin.withdraw.*']) }}">
              <a class="nav-link" href="{{ route('admin.withdraw.index') }}">Withdraw List</a>
            </li>
          </ul>
        </li>
        <li class="menu-header">SETTING & MORE</li>
        <li
          class="dropdown 
          {{ setActive(['admin.footer-info.index', 'admin.footer-socials.*', 'admin.footer-grid-two.*', 'admin.footer-grid-three.*']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
            <span>Footer</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.footer-info.*']) }}">
              <a class="nav-link" href="{{ route('admin.footer-info.index') }}">Footer Info</a>
            </li>
            <li class="{{ setActive(['admin.footer-socials.*']) }}">
              <a class="nav-link" href="{{ route('admin.footer-socials.index') }}">Footer Social</a>
            </li>
            <li class="{{ setActive(['admin.footer-grid-two.*']) }}">
              <a class="nav-link" href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a>
            </li>
            <li class="{{ setActive(['admin.footer-grid-three.*']) }}">
              <a class="nav-link" href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a>
            </li>
          </ul>
        </li>
        <li
          class="dropdown 
          {{ setActive(['admin.vendor-request.*', 'admin.customer.*', 'admin.vendor-list.*', 'admin.manage-user.index', 'admin.admin-list.index']) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.customer.*']) }}">
              <a class="nav-link" href="{{ route('admin.customer.index') }}">Customer List</a>
            </li>
            <li class="{{ setActive(['admin.vendor-list.*']) }}">
              <a class="nav-link" href="{{ route('admin.vendor-list.index') }}">Vendor List</a>
            </li>
            <li class="{{ setActive(['admin.vendor-request.*']) }}">
              <a class="nav-link" href="{{ route('admin.vendor-request.index') }}">Pending vendor</a>
            </li>
            <li class="{{ setActive(['admin.admin-list.index']) }}">
              <a class="nav-link" href="{{ route('admin.admin-list.index') }}">Admin List</a>
            </li>
            <li class="{{ setActive(['admin.manage-user.index']) }}">
              <a class="nav-link" href="{{ route('admin.manage-user.index') }}">Manage user</a>
            </li>
          </ul>
        </li>
        <li class="{{ setActive(['admin.subscribers.*']) }}"><a class="nav-link"
            href="{{ route('admin.subscribers.index') }}">
            <i class="fas fa-user"></i>
            <span>Subscribers</span></a>
        </li>
        <li class="{{ setActive(['admin.settings.index']) }}"><a class="nav-link"
            href="{{ route('admin.settings.index') }}">
            <i class="fas fa-wrench"></i>
            <span>Settings</span></a>
        </li>
      </ul>
    </aside>
  </div>
