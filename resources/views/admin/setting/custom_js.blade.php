@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Custom Js Setting')

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
                      <label for="category-name" class="form-label">Header JS</label>
                      <textarea name="custom_html_header" class="form-control" rows="6">{!! $setting['custom_html_header'] !!}</textarea>
                      <small>JS in header of page, wrap it inside <script></script></small>
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Body JS</label>
                      <textarea name="custom_html_body" class="form-control" rows="6">{!! $setting['custom_html_body'] !!}</textarea>
                      <small>JS in body of page, wrap it inside <script></script> </small>
                    </div>

                    <div class="col-12 mb-3">
                      <label for="category-name" class="form-label">Footer JS</label>
                      <textarea name="custom_html_footer" class="form-control" rows="6">{!! $setting['custom_html_footer'] !!}</textarea>
                      <small>JS in footer of page, wrap it inside <script></script> </small>
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
