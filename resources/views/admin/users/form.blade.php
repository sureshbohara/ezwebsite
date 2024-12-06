<div class="offcanvas offcanvas-end" tabindex="-1" id="users" aria-labelledby="offcanvasRightLabel">

   <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create New User</h5>
   <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
 </div>

 <form id="storeUsers" enctype="multipart/form-data">@csrf
  <div class="offcanvas-body">
    <div class="row">

      <div class="mb-3 col-md-12">
        <label class="form-label">Role Name</label>
        <select name="role_id" class="form-control">
          <option value="">--- select role ---</option>
          @foreach(\App\Models\Role::all() as $role)
          <option value="{{$role->id}}">&#x261E; {{$role->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Gender</label>
        <select class="form-select" name="gender">
          <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
          <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name">
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Aaddress</label>
        <input type="text" name="address" class="form-control" placeholder="User address">
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Contact No</label>
        <input type="text" name="mobile" class="form-control" placeholder="contact no">
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
      </div>
      <div class="mb-3 col-md-6">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password">
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Profile</label>
        <input type="file" class="form-control"  name="image" onchange="document.querySelector('.preview').src = window.URL.createObjectURL(this.files[0]);" >
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Current Profile</label>
        <img src="{{asset('noimage.png') }}" width="100px" class="preview" height="100px" >
      </div>

      <div class="mb-3 col-md-12">
        <label class="form-label">Information</label>
        <textarea class="form-control" name="info" placeholder="Leave a Information here" cols="12" rows="4"></textarea>
      </div>

      <div class="mb-3 col-md-12">
       <button type="submit" class="btn btn-primary">Save New Data</button>
      </div>


    </div>
  </div>

  

</form>

</div>