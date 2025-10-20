 <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
   <div class="card border">
     <div class="card-body">
       <form action="{{ route('admin.general-setting-update') }}" method="POST">
         @csrf
         @method('PUT')
         <h4>Category 1</h4>
         <div class="row">
           <div class="col-md-4">
             <div class="form-group">
               <label>Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
                 @foreach ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label>Sub Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label>Child Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
               </select>
             </div>
           </div>
         </div>
         <h4>Category 2</h4>
         <div class="row">
           <div class="col-md-4">
             <div class="form-group">
               <label>Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
                 @foreach ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label>Sub Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label>Child Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
               </select>
             </div>
           </div>
         </div>
         <h4>Category 3</h4>
         <div class="row">
           <div class="col-md-4">
             <div class="form-group">
               <label>Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
                 @foreach ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label>Sub Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label>Child Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
               </select>
             </div>
           </div>
         </div>
         <h4>Category 4</h4>
         <div class="row">
           <div class="col-md-4">
             <div class="form-group">
               <label>Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
                 @foreach ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label>Sub Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label>Child Category</label>
               <select name="layout" class="form-control">
                 <option value="">Select</option>
               </select>
             </div>
           </div>
         </div>
         <button type="submit" class="btn btn-primary">Update</button>
       </form>
     </div>
   </div>
 </div>
