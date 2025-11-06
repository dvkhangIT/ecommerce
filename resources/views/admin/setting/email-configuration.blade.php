 <div class="tab-pane fade" id="email-configuration" role="tabpanel" aria-labelledby="email-configuration-list">
   <div class="card border">
     <div class="card-body">
       <form action="{{ route('admin.email-setting-update') }}" method="POST">
         @csrf
         @method('PUT')
         <div class="form-group">
           <label>Email</label>
           <input type="text" value="{{ @$emailSettings->email }}" class="form-control" name="email">
         </div>
         <div class="form-group">
           <label>Mail Host</label>
           <input type="text" value="{{ @$emailSettings->host }}" class="form-control" name="host">
         </div>
         <div class="row">
           <div class="col-md-6">
             <div class="form-group">
               <label>Smtp Usernamne</label>
               <input type="text" value="{{ @$emailSettings->username }}" class="form-control" name="username">
             </div>
           </div>
           <div class="col-md-6">
             <div class="form-group">
               <label>Smtp Password</label>
               <input type="text" value="{{ @$emailSettings->password }}" class="form-control" name="password">
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-md-6">
             <div class="form-group">
               <label>Mail Port</label>
               <input type="text" value="{{ @$emailSettings->port }}" class="form-control" name="port">
             </div>
           </div>
           <div class="col-md-6">
             <div class="form-group">
               <label>Mail Encryption</label>
               <select class="form-control" name="encryption" id="">
                 <option {{ @$emailSettings->encryption == 'tls' ? 'selected' : '' }} value="tls">TSL</option>
                 <option {{ @$emailSettings->encryption == 'ssl' ? 'selected' : '' }} value="ssl">SSL</option>
               </select>
             </div>
           </div>
         </div>
         <button type="submit" class="btn btn-primary">Update</button>
       </form>
     </div>
   </div>
 </div>
