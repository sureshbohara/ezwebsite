<div class="offcanvas offcanvas-end" tabindex="-1" id="editUsers{{$data['id']}}" aria-labelledby="offcanvasRightLabel">
   <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">Update User Information</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>

   <form action="{{route('user.update',$data->id)}}" method="post" enctype="multipart/form-data">@csrf
      @method('PUT')
      <div class="offcanvas-body">
         <div class="row">

            <div class="mb-3 col-md-6">
               <label class="form-label">Role Name</label>
               <select name="role_id" class="form-control">
                  <option value="">--- select role ---</option>
                  @foreach(\App\Models\Role::all() as $role)
                     <option value="{{$role->id}}" 
                        @if($data->role_id == $role->id) selected @endif>
                        &#x261E; {{$role->name}}
                     </option>
                  @endforeach
               </select>
            </div>

             <div class="mb-3 col-md-6">
                      <label class="form-label">Gender</label>
                      <select class="form-select" name="gender">
                        <option value="male" {{ $data['gender'] == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $data['gender'] == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $data['gender'] == 'other' ? 'selected' : '' }}>Other</option>
                      </select> 
                     </div>

            <div class="mb-3 col-md-6">
               <label class="form-label">Full Name</label>
               <input type="text" name="name" class="form-control" value="{{$data['name']}}">
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label">Address</label>
               <input type="text" name="address" class="form-control" value="{{$data['address']}}">
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label">Contact No</label>
               <input type="text" name="mobile" class="form-control" value="{{$data['mobile']}}">
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label">Email</label>
               <input type="email" name="email" class="form-control" value="{{$data['email']}}">
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label">Profile</label>
               <input type="file" class="form-control"  name="image" onchange="document.querySelector('.preview1').src = window.URL.createObjectURL(this.files[0]);" >
            </div>

            <div class="mb-3 col-md-6">
               <label class="form-label">Current Profile</label>
               <img src="{{$data['imageUrl']}}" width="100px" class="preview1" height="100px">
            </div>

            <div class="mb-3 col-md-12">
               <label class="form-label">Information</label>
               <textarea class="form-control" name="info" placeholder="Leave information here" cols="12" rows="4">{{$data['info']}}</textarea>
            </div>

            <div class="mb-3 col-md-12">
               <button type="submit" class="btn btn-primary">Save & Update Data</button>
            </div>

         </div>
      </div>
   </form>
</div>
