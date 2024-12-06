<div class="offcanvas offcanvas-end" tabindex="-1" id="banner" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
   <h5 id="offcanvasRightLabel">Create New Banner Data</h5>
   <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
 </div>
 
 <form method="post" id="storeBanner" enctype="multipart/form-data">@csrf
  <div class="offcanvas-body">
    <div class="row">


      <div class="mb-3 col-md-12">
        <label class="form-label">Banner Title <span class="text-danger">*</span></label>
        <input type="text" name="banner_title" class="form-control" placeholder="Enter Banner Title">
      </div>

      <div class="mb-3 col-md-12">
        <label class="form-label">Banner Sub Title </label>
        <input type="text" name="banner_sub_title" class="form-control" placeholder="Enter Banner Sub Title">
      </div>

      <div class="mb-3 col-md-12">
        <label class="form-label">Banner Link </label>
        <input type="text" name="banner_link" class="form-control" placeholder="Enter Banner Link">
      </div>

      <div class="mb-3 col-md-12">
        <label class="form-label">Order Number</label>
        <input type="number" name="order_level" class="form-control" placeholder="Enter Banner Order Number" value="0">
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Banner Image</label>
        <input type="file" class="form-control"  name="image" onchange="document.querySelector('.preview').src = window.URL.createObjectURL(this.files[0]);" >
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label">Current Image</label>
        <img src="{{asset('noimage.png') }}" width="100px" class="preview" height="100px" >
      </div>

      <div class="mb-3 col-md-12">
        <label class="form-label">Banner Description</label>
        <textarea class="form-control" name="description" placeholder="Leave a banner description" cols="12" rows="3"></textarea>
      </div>

       <div class="mb-3 col-md-12">
       <button type="submit" class="btn btn-primary">Create New Data</button>
      </div>


    </div>
  </div>

 

</form>

</div>