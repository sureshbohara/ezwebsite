<div class="offcanvas offcanvas-end" tabindex="-1" id="gallery" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create New Gallery Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form method="post" id="storeGallery" enctype="multipart/form-data">
    @csrf
    <div class="offcanvas-body">
      <div class="row">
        
  
        <div class="mb-3 col-md-12">
          <label for="name" class="form-label">Website Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" placeholder="Enter Website Name">
        </div>

        <div class="mb-3 col-md-12">
        <label class="form-label">Portfolio Image <span class="text-danger">*</span></label>
        <input type="file" class="form-control"  name="image" onchange="document.querySelector('.preview').src = window.URL.createObjectURL(this.files[0]);" >
      </div>

      <div class="mb-3 col-md-12">
        <label class="form-label">Current Image</label>
        <img src="{{asset('noimage.png') }}" width="100px" class="preview" height="100px" >
      </div>

        <div class="mb-3 col-md-12">
          <label for="name" class="form-label">Website Url </label>
          <input type="text" name="alt" class="form-control" placeholder="Enter Website Url">
        </div>


        
        <div class="mb-3 col-md-12">
        <label class="form-label">Order Number <span class="text-danger">*</span></label>
         <input type="number" name="order_level" class="form-control" placeholder="Enter Order Number" value="0">
        </div>

        <!-- Display On Selector -->
        <div class="mb-3 col-md-12">
          <label for="display_on" class="form-label">Business Type<span class="text-danger">*</span></label>
          <select name="display_on" id="display_on" class="form-control" required>
            <option value="Transportation">Transportation</option>
            <option value="Health">Health</option>
            <option value="Organization">Organization</option>
            <option value="Movers">Movers</option>
            <option value="Ecommerce">Ecommerce</option>
          </select>
        </div>

      </div>
    </div>

    <!-- Footer / Submit Button -->
    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Create Gallery</button>
    </div>
  </form>
</div>
