@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Custom Css Setting')

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
                      <label for="category-name" class="form-label">Custom CSS</label>
                      <textarea name="custom_css" class="form-control" rows="10">{!! $setting['custom_css'] !!}</textarea>
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
