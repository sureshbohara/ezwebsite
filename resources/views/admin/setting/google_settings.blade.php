@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Google Setting')

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
         
         <div class="col-12 col-lg-4">
          <div class="card shadow-none bg-light border h-100">
            <div class="card-body">

              <div class="col-12 mb-3">
                <label for="category-name" class="form-label">Recaptcha Site Key</label>
                <input type="text" name="recaptcha_site_key" class="form-control" placeholder="recaptcha_site_key" value="{{$setting['recaptcha_site_key']}}" placeholder="Mail Transport">
              </div>

              <div class="col-12 mb-3">
                <label for="category-name" class="form-label">Recaptcha Recret Key</label>
                <input type="text" name="recaptcha_secret_key" class="form-control" placeholder="recaptcha_secret_key" value="{{$setting['recaptcha_secret_key']}}" placeholder="Mail Host">
              </div>


              <div class="col-12 mb-3">
                <label for="category-name" class="form-label">CHECK RECAPTCHA</label>
                <select class="form-select" name="is_recaptcha">
                 <option value="0" <?php if (isset($setting['is_recaptcha']) && $setting['is_recaptcha'] == 0) echo 'selected'; ?>>No</option>
                 <option value="1" <?php if (isset($setting['is_recaptcha']) && $setting['is_recaptcha'] == 1) echo 'selected'; ?>>Yes</option>
               </select>
             </div>


             <div class="col-12 mb-3">
              <label for="category-name" class="form-label">Google Analytic ID</label>
              <input type="text" name="google_analytic_id" class="form-control" placeholder="google_analytic_id" value="{{$setting['google_analytic_id']}}" placeholder="Google Analytic ID">
            </div>

            <div class="col-12 mb-3">
              <label for="category-name" class="form-label">Facebook Analytic</label>
              <input type="text" name="facebook_analytic_id" class="form-control" placeholder="facebook_analytic_id" value="{{$setting['facebook_analytic_id']}}" placeholder="Facebook Analytic ID">
            </div>



          </div>
        </div>
      </div>


      <div class="col-12 col-lg-4">
        <div class="card shadow-none bg-light border h-100">
          <div class="card-body">

            <div class="col-12 mb-3">
              <label for="category-name" class="form-label">Facebook Client ID</label>
              <input type="text" name="facebook_client_id" class="form-control" placeholder="facebook_client_id" value="{{$setting['facebook_client_id']}}" placeholder="Facebook Client ID">
            </div>

            <div class="col-12 mb-3">
              <label for="category-name" class="form-label">Facebook Client Secret</label>
              <input type="text" name="facebook_client_secret" class="form-control" placeholder="facebook_client_secret" value="{{$setting['facebook_client_secret']}}" placeholder="Facebook Client Secret">
            </div>

            <div class="col-12 mb-3">
              <label for="category-name" class="form-label">Facebook Redirect</label>
              <input type="text" name="facebook_redirect" class="form-control" placeholder="facebook_redirect" value="{{$setting['facebook_redirect']}}" placeholder="Facebook Redirect">
            </div>


            <div class="col-12 mb-3">
              <label for="category-name" class="form-label">CHECK FACEBOOK</label>
              <select class="form-select" name="is_facebook">
               <option value="0" <?php if (isset($setting['is_facebook']) && $setting['is_facebook'] == 0) echo 'selected'; ?>>No</option>
               <option value="1" <?php if (isset($setting['is_facebook']) && $setting['is_facebook'] == 1) echo 'selected'; ?>>Yes</option>
             </select>
           </div>


         </div>
       </div>
     </div>


     <div class="col-12 col-lg-4">
      <div class="card shadow-none bg-light border h-100">
        <div class="card-body">

          <div class="col-12 mb-3">
            <label for="category-name" class="form-label">Google Client ID</label>
            <input type="text" name="google_client_id" class="form-control" placeholder="google_client_id" value="{{$setting['google_client_id']}}" placeholder="Google Client ID">
          </div>

          <div class="col-12 mb-3">
            <label for="category-name" class="form-label">Google Client Secret</label>
            <input type="text" name="google_client_secret" class="form-control" placeholder="google_client_secret" value="{{$setting['google_client_secret']}}" placeholder="Google Client Secret">
          </div>

          <div class="col-12 mb-3">
            <label for="category-name" class="form-label">Google Redirect</label>
            <input type="text" name="google_redirect" class="form-control" placeholder="google_redirect" value="{{$setting['google_redirect']}}" placeholder="Google Redirect">
          </div>


          <div class="col-12 mb-3">
            <label for="category-name" class="form-label">CHECK GOOGLE</label>
            <select class="form-select" name="is_google">
             <option value="0" <?php if (isset($setting['is_google']) && $setting['is_google'] == 0) echo 'selected'; ?>>No</option>
             <option value="1" <?php if (isset($setting['is_google']) && $setting['is_google'] == 1) echo 'selected'; ?>>Yes</option>
           </select>
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
