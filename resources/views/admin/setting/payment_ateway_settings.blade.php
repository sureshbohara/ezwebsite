@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Payment Setting')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header py-3 bg-custom">
        <h6 class="mb-0 text-light">Update Setting</h6>
      </div>
      <form id="updateSetting">@csrf
       <div class="card-body">
      
         <div class="row">
         
             <!-- Paypal Settings -->
             <div class="col-12 col-lg-6 mb-3">
              <div class="card shadow-none bg-light border h-100">
                <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="paypal_app_id" class="form-label">Paypal App Id</label>
                      <input type="text" name="paypal_app_id" class="form-control" value="{{ old('paypal_app_id', $setting['paypal_app_id']) }}" placeholder="Paypal App">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="paypal_client_id" class="form-label">Paypal Client Id</label>
                      <input type="text" name="paypal_client_id" class="form-control" value="{{ old('paypal_client_id', $setting['paypal_client_id']) }}" placeholder="Paypal Client Id">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="paypal_secrey_id" class="form-label">Paypal Client Secret</label>
                      <input type="text" name="paypal_secrey_id" class="form-control" value="{{ old('paypal_secrey_id', $setting['paypal_secrey_id']) }}" placeholder="Paypal Client Secret">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="paypal_mode" class="form-label">Paypal Mode</label>
                      <select class="form-select" name="paypal_mode">
                         <option value="Sandbox" {{ old('paypal_mode', $setting['paypal_mode']) == 'Sandbox' ? 'selected' : '' }}>Sandbox</option>
                         <option value="Live" {{ old('paypal_mode', $setting['paypal_mode']) == 'Live' ? 'selected' : '' }}>Live</option>
                     </select>
                    </div>
                </div>
              </div>
            </div>

            <!-- Stripe Settings -->
             <div class="col-12 col-lg-6 mb-3">
              <div class="card shadow-none bg-light border h-100">
                <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="stripe_key" class="form-label">Stripe Key</label>
                      <input type="text" name="stripe_key" class="form-control" value="{{ old('stripe_key', $setting['stripe_key']) }}" placeholder="Stripe Key">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="stripe_secret" class="form-label">Stripe Secret</label>
                      <input type="text" name="stripe_secret" class="form-control" value="{{ old('stripe_secret', $setting['stripe_secret']) }}" placeholder="Stripe Secret">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="stripe_mode" class="form-label">Stripe Mode</label>
                      <select class="form-select" name="stripe_mode">
                         <option value="Sandbox" {{ old('stripe_mode', $setting['stripe_mode']) == 'Sandbox' ? 'selected' : '' }}>Sandbox</option>
                         <option value="Live" {{ old('stripe_mode', $setting['stripe_mode']) == 'Live' ? 'selected' : '' }}>Live</option>
                     </select>
                    </div>
                </div>
              </div>
            </div>

            <!-- e-Sewa Settings -->
            <div class="col-12 col-lg-6 mb-3">
              <div class="card shadow-none bg-light border h-100">
                <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="esewa_merchant_id" class="form-label">e-Sewa MERCHANT ID</label>
                      <input type="text" name="esewa_merchant_id" class="form-control" value="{{ old('esewa_merchant_id', $setting['esewa_merchant_id']) }}" placeholder="Merchant Id">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="esewa_secret_key" class="form-label">e-Sewa SECRET KEY</label>
                      <input type="text" name="esewa_secret_key" class="form-control" value="{{ old('esewa_secret_key', $setting['esewa_secret_key']) }}" placeholder="API Key">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="esewa_service_url" class="form-label">e-Sewa SERVICE URL</label>
                      <input type="text" name="esewa_service_url" class="form-control" value="{{ old('esewa_service_url', $setting['esewa_service_url']) }}" placeholder="Service URL">
                    </div>
                </div>
              </div>
            </div>

            <!-- Khalti Settings -->
            <div class="col-12 col-lg-6 mb-3">
              <div class="card shadow-none bg-light border h-100">
                <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="khalti_public_key" class="form-label">Khalti Public Key</label>
                      <input type="text" name="khalti_public_key" class="form-control" value="{{ old('khalti_public_key', $setting['khalti_public_key']) }}" placeholder="Public Key">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="khalti_secret_key" class="form-label">Khalti Secret Key</label>
                      <input type="text" name="khalti_secret_key" class="form-control" value="{{ old('khalti_secret_key', $setting['khalti_secret_key']) }}" placeholder="Secret Key">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="khalti_merchant_id" class="form-label">Khalti Merchant ID</label>
                      <input type="text" name="khalti_merchant_id" class="form-control" value="{{ old('khalti_merchant_id', $setting['khalti_merchant_id']) }}" placeholder="Merchant ID">
                    </div>

                    <div class="col-12 mb-3">
                      <label for="khalti_base_url" class="form-label">Khalti Base URL</label>
                      <input type="text" name="khalti_base_url" class="form-control" value="{{ old('khalti_base_url', $setting['khalti_base_url']) }}" placeholder="Base URL">
                    </div>
                </div>
              </div>
            </div>

         </div>
        
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Save & Update</button>
     </div>
     
    </form>
  </div>
</main>
@endsection
