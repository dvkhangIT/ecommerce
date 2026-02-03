 <div class="tab-pane fade" id="list-logo" role="tabpanel" aria-labelledby="list-logo-list">
   <div class="card border">
     <div class="card-body">
       <form action="{{ route('admin.logo-setting-update') }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="form-group">
           <img src="{{ asset(@$logoSetting->logo) }}" width="150px" alt="">
           <br>
           <label>Logo</label>
           <input type="file" value="" class="form-control" name="logo">
           <input type="hidden" value="{{ @$logoSetting->logo }}" class="form-control" name="old_logo">
         </div>
         <div class="form-group">
           <img src="{{ asset(@$logoSetting->footer_logo) }}" width="150px" alt="">
           <br>
           <label>Footer logo</label>
           <input type="file" value="" class="form-control" name="footer_logo">
           <input type="hidden" value="{{ @$logoSetting->footer_logo }}" class="form-control" name="old_footer_logo">
         </div>
         <div class="form-group">
           <img src="{{ asset(@$logoSetting->favicon) }}" width="150px" alt="">
           <br>
           <label>Favicon</label>
           <input type="file" value="" class="form-control" name="favicon">
           <input type="hidden" value="{{ @$logoSetting->favicon }}" class="form-control" name="old_favicon">
         </div>
         <button type="submit" class="btn btn-primary">Update</button>
       </form>
     </div>
   </div>
 </div>
