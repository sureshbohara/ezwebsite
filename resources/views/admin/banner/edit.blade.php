<div class="offcanvas offcanvas-end" tabindex="-1" id="editData{{$data['id']}}" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Update Banner Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <!-- Form to update banner -->
  <form action="{{ route('banner.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="offcanvas-body">
        <div class="row">

            <!-- Banner Title -->
            <div class="mb-3 col-md-12">
                <label class="form-label">Banner Title <span class="text-danger">*</span></label>
                <input type="text" name="banner_title" class="form-control" placeholder="Enter Banner Title" value="{{ $data->banner_title }}">
            </div>

            <!-- Banner Sub Title -->
            <div class="mb-3 col-md-12">
                <label class="form-label">Banner Sub Title</label>
                <input type="text" name="banner_sub_title" class="form-control" placeholder="Enter Banner Sub Title" value="{{ $data->banner_sub_title }}">
            </div>

            <!-- Banner Link -->
            <div class="mb-3 col-md-12">
                <label class="form-label">Banner Link</label>
                <input type="text" name="banner_link" class="form-control" placeholder="Enter Banner Link" value="{{ $data->banner_link }}">
            </div>

            <div class="mb-3 col-md-12">
            <label class="form-label">Order Number</label>
             <input type="number" name="order_level" class="form-control" placeholder="Enter Banner Order Number" value="{{ $data->order_level }}">
          </div>

            <!-- Banner Image Upload -->
            <div class="mb-3 col-md-6">
                <label class="form-label">Banner Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <!-- Current Image Preview -->
            <div class="mb-3 col-md-6">
                <label class="form-label">Current Image</label>
                <img src="{{  $data->imageUrl }}" width="100%" height="100px">
            </div>

            <!-- Banner Description -->
            <div class="mb-3 col-md-12">
                <label class="form-label">Banner Description</label>
                <textarea class="form-control" name="description" placeholder="Leave a banner description" cols="12" rows="3">{{ $data->description }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="mb-3 col-md-12">
                <button type="submit" class="btn btn-primary">Save & Update Data</button>
            </div>

        </div>
    </div>
</form>


</div>
