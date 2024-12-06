<div class="offcanvas offcanvas-end" tabindex="-1" id="editData{{ $data->id }}" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Update Gallery Data</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form action="{{ route('gallery.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="offcanvas-body">
      <div class="row">

        <!-- Image Name -->
        <div class="mb-3 col-md-12">
          <label for="name" class="form-label">Website Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control"  value="{{ $data->name }}">
        </div>

        <!-- Image Upload -->
        <div class="mb-3 col-md-12">
          <label class="form-label">Portfolio Image</label>
          <input type="file" class="form-control" name="image">
          <small  class="form-text text-muted">Choose an image to replace the current one.</small>
        </div>

        <div class="mb-3 col-md-12">
         <label class="form-label">Current Image</label>
         <img src="{{ $data['imageUrl']}}" width="100%" height="100px" >
        </div>


        <!-- Image Alt Name -->
        <div class="mb-3 col-md-12">
          <label for="alt" class="form-label">Website Url</label>
          <input type="text" name="alt" class="form-control" value="{{ $data->alt }}"/>

        </div>

        <!-- Order Number -->
        <div class="mb-3 col-md-12">
          <label class="form-label">Order Number</label>
          <input type="number" name="order_level" class="form-control" value="{{ $data->order_level }}">
        </div>

        <!-- Display On Selector -->
        <div class="mb-3 col-md-12">
          <label for="display_on" class="form-label">Business Type <span class="text-danger">*</span></label>
          <select name="display_on" id="display_on" class="form-control" required>
            <option value="Transportation" {{ $data->display_on == 'Transportation' ? 'selected' : '' }}>Transportation</option>
            <option value="Health" {{ $data->display_on == 'Health' ? 'selected' : '' }}>Health</option>
            <option value="Organization" {{ $data->display_on == 'Organization' ? 'selected' : '' }}>Organization</option>
            <option value="Movers" {{ $data->display_on == 'Movers' ? 'selected' : '' }}>Movers</option>
            <option value="Ecommerce" {{ $data->display_on == 'Ecommerce' ? 'selected' : '' }}>Ecommerce</option>
          </select>
        </div>

      </div>
    </div>

    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Save & Update</button>
    </div>
  </form>
</div>

