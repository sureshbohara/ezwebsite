<div class="offcanvas offcanvas-end" tabindex="-1" id="review" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create New Review Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form method="post" id="storeReview" enctype="multipart/form-data">@csrf
    <div class="offcanvas-body">
      <div class="row">
        <!-- Full Name -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
        </div>

        <!-- Email -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
        </div>

        <!-- Address -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="address">Address</label>
          <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address">
        </div>

        <!-- Rating -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="rating">Rating <span class="text-danger">*</span></label>
          <input type="number" id="rating" name="rating" class="form-control" value="5" min="1" max="5">

        </div>

        <!-- Order Level -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="order_level">Order Number <span class="text-danger">*</span></label>
          <input type="number" id="order_level" name="order_level" class="form-control" placeholder="Enter Banner Order Number" value="0">
        </div>

        <!-- Image Upload -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="image">Image</label>
          <input type="file" id="image" name="image" class="form-control">
        </div>

         <!-- Review Text -->
        <div class="mb-3 col-md-12">
          <label class="form-label" for="review">Short Review <span class="text-danger">*</span></label>
          <textarea class="form-control" id="review" name="review" placeholder="Leave a review" cols="12" rows="3"></textarea>
       
        </div>

        <div class="mb-3 col-md-12">
          <label class="form-label" for="review">Long Review <span class="text-danger">*</span></label>
          <textarea class="form-control" id="content" name="content" placeholder="Leave a review" cols="12" rows="3"></textarea>
       
        </div>


        <!-- Display Options -->
        <div class="mb-3 col-md-12">
          <label class="form-label" for="display_on">Display ON <span class="text-danger">*</span></label>
          <select name="display_on" id="display_on" class="form-control">
            <option value="default">Default</option>
            <option value="home">Home Page</option>
          </select>
        </div>

        <!-- Submit Button -->
        <div class="mb-3 col-md-12">
          <button type="submit" class="btn btn-primary">Create New Data</button>
        </div>
      </div>
    </div>
  </form>
</div>


