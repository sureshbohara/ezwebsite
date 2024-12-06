@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Custom HML Setting')

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
         
             <div class="col-12 col-lg-12">
              <div class="card shadow-none bg-light border">
                <div class="card-body">

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Header HTML</label>
                      <textarea name="custom_js_header" class="form-control" rows="7">{!! $setting['custom_js_header'] !!}</textarea>
                      <small>HTML in header of page, no special tags: script, style, iframe.</small>
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Body HTML</label>
                      <textarea name="custom_js_body" class="form-control" rows="7">{!! $setting['custom_js_body'] !!}</textarea>
                      <small>HTML in body of page, no special tags: script, style, iframe.</small>
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Footer HTML</label>
                      <textarea name="custom_js_footer" class="form-control" rows="7">{!! $setting['custom_js_footer'] !!}</textarea>
                      <small>HTML in footer of page, no special tags: script, style, iframe <script></script> </small>
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
