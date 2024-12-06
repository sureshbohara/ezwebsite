<div class="offcanvas offcanvas-end" tabindex="-1" id="plans" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create New Plans</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form method="post" id="storePlans" enctype="multipart/form-data">@csrf
    <div class="offcanvas-body">
      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="name" class="form-label">Plans Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" placeholder="Pricing Plans Name">
        </div>

        <div class="mb-3 col-md-6">
          <label for="price" class="form-label">Plans Price <span class="text-danger">*</span></label>
          <input type="number" name="price" class="form-control" placeholder="Pricing Plans Price">
        </div>

        <div class="mb-3 col-md-12">
          <label for="excerpt" class="form-label">Additional Features <span class="text-danger">*</span></label>
          <textarea class="form-control" name="excerpt" placeholder="Additional Features" rows="3"></textarea>
        </div>

        <div class="mb-3 col-md-6">
          <label class="form-label" for="order_level">Order Level <span class="text-danger">*</span></label>
          <input name="order_level" type="number" class="form-control" value="0">
        </div>

        <div class="mb-3 col-md-6">
          <label for="bg_color" class="form-label">Bg Color<span class="text-danger">*</span></label>
          <input type="color" name="bg_color" class="form-control" placeholder="Pricing Plans Bg Colors">
        </div>

        <div class="col-12 plansDisplay"></div>

        <div class="col-12 mt-3">
          <label class="form-label">
            Plans Service
            <span class="btn btn-custom addMore" style="cursor: pointer;"><i class="bi bi-plus-circle"></i> Add Service</span>
          </label>
        </div>


        <div class="mb-3 col-md-12">
          <label for="display_on" class="form-label">Categories Type<span class="text-danger">*</span></label>
          <select name="display_on" id="display_on" class="form-control" required>
            <option value="Shared Hosting">Shared Hosting</option>
            <option value="Magento Extensions">Magento Extensions</option>
            <option value="SSL Certificates">SSL Certificates</option>
            <option value="Website Security">Website Security</option>
            <option value="Website Builder">Website Builder</option>
            <option value="Register a New Domain">Register a New Domain</option>
            <option value="Transfer Domain">Transfer Domain</option>
          </select>
        </div>

      </div>
    </div>

    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Create New Data</button>
    </div>
  </form>
</div>
