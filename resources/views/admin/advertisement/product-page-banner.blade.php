 <div class="tab-pane fade" id="list-product" role="tabpanel" aria-labelledby="list-product-list">
   <div class="card border">
     <div class="card-body">
       <form action="{{ route('admin.productpage-banner') }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="form-group">
           <div class="control-label">Status</div>
           <label class="custom-switch mt-2">
             <input type="checkbox" {{ @$productpage_banner_section->banner_one->status == 1 ? 'checked' : '' }}
               name="status" class="custom-switch-input">
             <span class="custom-switch-indicator"></span>
           </label>
         </div>
         <div class="form-group">
           <img src="{{ asset(@$productpage_banner_section->banner_one->banner_image) }}" width="150px" alt="">
         </div>
         <div class="form-group">
           <label>Banner Image</label>
           <input type="file" class="form-control" name="banner_image">
           <input type="hidden" name="banner_old_image"
             value="{{ @$productpage_banner_section->banner_one->banner_image }}">
         </div>
         <div class="form-group">
           <label>Banner Url</label>
           <input type="text" value="{{ @$productpage_banner_section->banner_one->banner_url }}" class="form-control"
             name="banner_url">
         </div>
         <button type="submit" class="btn btn-primary">Update</button>
       </form>
     </div>
   </div>
 </div>
