<div class="offcanvas offcanvas-end" tabindex="-1" id="editData{{$data->id}}" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Update Review Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form action="{{ route('review.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="offcanvas-body">
      <div class="row">

        <!-- Full Name -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $data->name) }}" required>
        </div>
        
        <!-- Email -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email', $data->email) }}">
        </div>
        
        <!-- Address -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="address">Address</label>
          <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address', $data->address) }}">
        </div>
        
        <!-- Rating -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="rating">Rating</label>
          <input type="number" id="rating" name="rating" class="form-control" value="{{ old('rating', $data->rating) }}" min="1" max="5" required>
        </div>
        
      
        
        <!-- Image Upload -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="image">Image</label>
          <input type="file" id="image" name="image" class="form-control">
        </div>
        
        <!-- Image Preview -->
        <div class="mb-3 col-md-6">
          <label class="form-label">Current Image</label>
          <img src="{{$data->imageUrl }}" alt="Current Review Image"  width="100%" height="100px">
        </div>

        <!-- Review -->
        <div class="mb-3 col-md-12">
          <label class="form-label" for="review">Short Review</label>
          <textarea class="form-control" id="review" name="review" placeholder="Leave a review" cols="12" rows="3">{{ old('review', $data->review) }}</textarea>
        </div>

        <div class="mb-3 col-md-12">
          <label class="form-label" for="review">Long Review</label>
          <textarea class="form-control" id="content" name="content" placeholder="Leave a review" cols="12" rows="3">{{ old('content', $data->content) }}</textarea>
        </div>

        <!-- Display On -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="display_on">Display ON <span class="text-danger">*</span></label>
          <select name="display_on" id="display_on" class="form-control" required>
            <option value="default" {{ old('display_on', $data->display_on) == 'default' ? 'selected' : '' }}>Default</option>
            <option value="home" {{ old('display_on', $data->display_on) == 'home' ? 'selected' : '' }}>Home Page</option>
          </select>
        </div>

          <!-- Order Number -->
        <div class="mb-3 col-md-6">
          <label class="form-label" for="order_level">Order Number</label>
          <input type="number" id="order_level" name="order_level" class="form-control" placeholder="Enter Banner Order Number" value="{{ old('order_level', $data->order_level) }}">
        </div>

        
        <!-- Submit Button -->
        <div class="mb-3 col-md-12">
          <button type="submit" class="btn btn-primary">Save & Update Data</button>
        </div>

      </div>
    </div>
  </form>
</div>

