@extends('layouts.backend.layout')

@section('title', 'Setting')
@section('main_title', 'Media Setting')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
    <div class="card-header py-3 bg-custom">
      <h6 class="mb-0 text-light">Update Setting</h6>
    </div>
    <form id="updateSetting" enctype="multipart/form-data">@csrf
      <div class="card-body">
        <div class="row">
          @foreach(['favicon' => 'WEBSITE FAVICON', 'logo' => 'WEBSITE LOGO', 'loader' => 'WEBSITE LOADER', 'footer_gateway_img' => 'PAYMENT GATEWAY', 'bg_image' => 'BG IMAGE','breadcrumb' => 'BREADCRUMB', 'image1' => 'HOME PAGE ABOUT US IMAGE', 'image2' => 'HOME PAGE SERVICES IMAGE', 'image3' => 'PARA IMAGE'] as $field => $label)
            <div class="col-12 col-lg-3 mb-3">
              <div class="card shadow-none bg-light border">
                <div class="card-body">
                  <div class="col-12 mb-3">
                    <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                    <img src="{{ $setting->$field ? asset('images/'.$setting->$field) : asset('noimage.png') }}" width="100%" class="{{ $field }}">
                  </div>
                </div>
                <div class="card-footer">
                  <input type="file" id="{{ $field }}" name="{{ $field }}" onchange="document.querySelector('.{{ $field }}').src = window.URL.createObjectURL(this.files[0]);">
                </div>
              </div>
            </div>
          @endforeach
        </div>
    
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Save & Update</button>
      </div>
    </form>
  </div>
</main>
@endsection
