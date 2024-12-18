<div class="offcanvas offcanvas-end" tabindex="-1" id="client" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create New Client</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form method="post" id="storeBusiness" enctype="multipart/form-data">@csrf
    <div class="offcanvas-body">
      <div class="row">


        <div class="mb-3 col-md-6">
          <label for="business_type" class="form-label">Business Type<span class="text-danger">*</span></label>
          <select name="business_type" id="business_type" class="form-control" required>
            <option value="Transportation">Transportation</option>
            <option value="Health">Health</option>
            <option value="Organization">Organization</option>
            <option value="Movers">Movers</option>
            <option value="Ecommerce">Ecommerce</option>
            <option value="Cleaning">Cleaning</option>
            <option value="Construction">Construction</option>
            <option value="Plumbing">Plumbing</option>
            <option value="Beauty Spa">Beauty & Spa</option>
          </select>
        </div>

        <div class="mb-3 col-md-6">
          <label for="business_name" class="form-label">Business Name<span class="text-danger">*</span></label>
          <input type="text" name="business_name" id="business_name" class="form-control" placeholder="Business Name">
        </div>

        <div class="mb-3 col-md-6">
          <label for="website" class="form-label">Current Website</label>
          <input type="text" name="website" id="website" class="form-control" placeholder="Current Website">
        </div>

        <div class="mb-3 col-md-6">
          <label for="domain_request" class="form-label">Domain Request</label>
          <input type="text" name="domain_request" id="domain_request" class="form-control" placeholder="Domain Request">
        </div>

        <div class="mb-3 col-md-6">
          <label for="owner_name" class="form-label">Owner Name <span class="text-danger">*</span></label>
          <input type="text" name="owner_name" id="owner_name" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
          <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
          <input type="tel" name="phone" id="phone" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="start_date" class="form-label">Start Date</label>
          <input type="date" name="start_date" id="start_date" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="end_date" class="form-label">End Date</label>
          <input type="date" name="end_date" id="end_date" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="designing_cost" class="form-label">Designing Cost</label>
          <input type="number" name="designing_cost" id="designing_cost" class="form-control" step="0.01">
        </div>

        <div class="mb-3 col-md-6">
          <label for="hosting_cost" class="form-label">Hosting Cost</label>
          <input type="number" name="hosting_cost" id="hosting_cost" class="form-control" step="0.01">
        </div>

        <div class="mb-3 col-md-6">
          <label for="card_name" class="form-label">Cardholder Name</label>
          <input type="text" name="card_name" id="card_name" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="card_number" class="form-label">Card Number</label>
          <input type="text" name="card_number" id="card_number" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="expiration_date" class="form-label">Expiration Date</label>
          <input type="month" name="expiration_date" id="expiration_date" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="security_code" class="form-label">Security Code</label>
          <input type="text" name="security_code" id="security_code" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
          <label for="billing_address" class="form-label">Billing Address</label>
          <input type="text" name="billing_address" id="billing_address" class="form-control">
        </div>

        <div class="mb-3 col-md-12">
          <label for="details" class="form-label">Additional Details</label>
          <textarea class="form-control" name="details" id="details" placeholder="Additional Features" rows="3"></textarea>
        </div>

      </div>
    </div>

    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Create New Data</button>
    </div>
  </form>
</div>
