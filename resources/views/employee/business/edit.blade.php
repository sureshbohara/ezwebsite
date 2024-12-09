<div class="offcanvas offcanvas-end" tabindex="-1" id="editData{{$data['id']}}" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Edit Client</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <form action="{{ route('business.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="offcanvas-body">
      <div class="row">

        <div class="mb-3 col-md-6">
          <label for="business_type" class="form-label">Business Type <span class="text-danger">*</span></label>
          <select name="business_type" id="business_type" class="form-control" required>
            <option value="Transportation" {{ old('business_type', $data->business_type) == 'Transportation' ? 'selected' : '' }}>Transportation</option>
            <option value="Health" {{ old('business_type', $data->business_type) == 'Health' ? 'selected' : '' }}>Health</option>
            <option value="Organization" {{ old('business_type', $data->business_type) == 'Organization' ? 'selected' : '' }}>Organization</option>
            <option value="Movers" {{ old('business_type', $data->business_type) == 'Movers' ? 'selected' : '' }}>Movers</option>
            <option value="Ecommerce" {{ old('business_type', $data->business_type) == 'Ecommerce' ? 'selected' : '' }}>Ecommerce</option>
            <option value="Cleaning" {{ old('business_type', $data->business_type) == 'Cleaning' ? 'selected' : '' }}>Cleaning</option>
            <option value="Construction" {{ old('business_type', $data->business_type) == 'Construction' ? 'selected' : '' }}>Construction</option>
            <option value="Plumbing" {{ old('business_type', $data->business_type) == 'Plumbing' ? 'selected' : '' }}>Plumbing</option>
            <option value="Beauty Spa" {{ old('business_type', $data->business_type) == 'Beauty Spa' ? 'selected' : '' }}>Beauty & Spa</option>
          </select>
        </div>

        <div class="mb-3 col-md-6">
          <label for="business_name" class="form-label">Business Name <span class="text-danger">*</span></label>
          <input type="text" name="business_name" class="form-control" placeholder="Business Name" value="{{ old('business_name', $data->business_name) }}" required>
        </div>

        <div class="mb-3 col-md-6">
          <label for="website" class="form-label">Current Website</label>
          <input type="text" name="website" class="form-control" placeholder="Current Website" value="{{ old('website', $data->website) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="domain_request" class="form-label">Domain Request</label>
          <input type="text" name="domain_request" class="form-control" placeholder="Domain Request" value="{{ old('domain_request', $data->domain_request) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="owner_name" class="form-label">Owner Name <span class="text-danger">*</span></label>
          <input type="text" name="owner_name" class="form-control" value="{{ old('owner_name', $data->owner_name) }}" required>
        </div>

        <div class="mb-3 col-md-6">
          <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
          <input type="email" name="email" class="form-control" value="{{ old('email', $data->email) }}" required>
        </div>

        <div class="mb-3 col-md-6">
          <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
          <input type="tel" name="phone" class="form-control" value="{{ old('phone', $data->phone) }}" required>
        </div>

        <div class="mb-3 col-md-6">
          <label for="start_date" class="form-label">Start Date</label>
          <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $data->start_date) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="end_date" class="form-label">End Date</label>
          <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $data->end_date) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="designing_cost" class="form-label">Designing Cost</label>
          <input type="number" name="designing_cost" class="form-control" step="0.01" value="{{ old('designing_cost', $data->designing_cost) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="hosting_cost" class="form-label">Hosting Cost</label>
          <input type="number" name="hosting_cost" class="form-control" step="0.01" value="{{ old('hosting_cost', $data->hosting_cost) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="card_name" class="form-label">Cardholder Name</label>
          <input type="text" name="card_name" class="form-control" value="{{ old('card_name', $data->card_name) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="card_number" class="form-label">Card Number</label>
          <input type="text" name="card_number" class="form-control" value="{{ old('card_number', $data->card_number) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="expiration_date" class="form-label">Expiration Date</label>
          <input type="month" name="expiration_date" class="form-control" value="{{ old('expiration_date', $data->expiration_date) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="security_code" class="form-label">Security Code</label>
          <input type="text" name="security_code" class="form-control" value="{{ old('security_code', $data->security_code) }}">
        </div>

        <div class="mb-3 col-md-6">
          <label for="billing_address" class="form-label">Billing Address</label>
          <input type="text" name="billing_address" class="form-control" value="{{ old('billing_address', $data->billing_address) }}">
        </div>

        <div class="mb-3 col-md-12">
          <label for="details" class="form-label">Additional Details</label>
          <textarea class="form-control" name="details" placeholder="Additional Features" rows="3">{{ old('details', $data->details) }}</textarea>
        </div>

      </div>
    </div>

    <div class="offcanvas-footer mt-auto p-3">
      <button type="submit" class="btn btn-primary w-100">Save & Update</button>
    </div>
  </form>
</div>
