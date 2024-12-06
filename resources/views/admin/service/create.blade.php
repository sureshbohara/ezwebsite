@extends('layouts.backend.layout')

@section('title', 'Service')
@section('main_title', 'Service Create')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 

  <div class="card">
    <div class="card-header py-3 bg-transparent">
      <div class="d-sm-flex align-items-center">
        <h5 class="mb-2 mb-sm-0">Add New Service</h5>
        <div class="ms-auto">
          <a href="{{ route('service.index') }}" class="btn btn-primary text-light">View Service List</a>
        </div>
      </div>
    </div>

    <div class="card-body">
      <form id="storeService" method="post" enctype="multipart/form-data">@csrf
        <div class="row g-3">
          <!-- Left Column -->
          <div class="col-12 col-lg-8">
            <div class="card shadow-none bg-light border h-100">
              <div class="card-body row g-3">

                <!-- Service Title -->
                <div class="col-12">
                  <label class="form-label" for="service_title">Service Title <span class="text-danger">*</span></label>
                  <input type="text" name="service_title" id="service_title" class="form-control" placeholder="Service Title">
                </div>

                <!-- Service Sub Title -->
                <div class="col-12">
                  <label class="form-label" for="service_sub_title">Home Page Text</label>
                  <input type="text" name="service_sub_title" id="service_sub_title" class="form-control" placeholder="Service Sub Title">
                </div>

                <!-- Service Description -->
                <div class="col-12">
                  <label class="form-label" for="description">Service Description</label>
                  <textarea name="description" id="description" class="form-control editor" placeholder="Service Description.." rows="4"></textarea>
                </div>



                <!-- Service Features -->
                <div class="col-12 featureDisplay"></div>
                <div class="col-12">
                  <label class="form-label">
                    Service Features
                    <span class="btn btn-custom addFeatures" style="cursor: pointer;"><i class="bi bi-plus-circle"></i> Add Features</span>
                  </label>
                </div>

                <!-- SEO Section -->
                <div class="col-12">
                  @include('layouts.backend.seo_section')
                </div>
    
              </div>
            </div>
          </div>

          <!-- Right Column -->
          <div class="col-12 col-lg-4">
            <div class="card shadow-none bg-light border h-100">
              <div class="card-body">
                <div class="row g-3">

                  <!-- Excerpt -->
                  <div class="col-12">
                    <label class="form-label" for="excerpt">Excerpt<span class="text-danger">*</span></label>
                    <textarea name="excerpt" id="excerpt" class="form-control" rows="3" placeholder="Content description.."></textarea>
                  </div>

                  <!-- Order Level -->
                  <div class="col-12">
                    <label class="form-label" for="order_level">Order Level <span class="text-danger">*</span></label>
                    <input name="order_level" id="order_level" type="number" class="form-control" value="0">
                  </div>

                  <!-- Display On -->
                  <div class="col-12">
                    <label class="form-label" for="display_on">Services Type <span class="text-danger">*</span></label>
                    <select name="display_on" id="display_on" class="form-control">
                      <option value="Delivery">Delivery Services</option>
                      <option value="Transport">Transport Services</option>
                    </select>
                  </div>

                  <!-- Thumbnail Image -->
                  <div class="col-12">
                    <label class="form-label" for="image">Thumbnail Image <small class="text-danger">Image Size: height:300px, width:300px</small></label>
                    <input type="file" class="form-control" name="image" id="image" onchange="document.querySelector('.preview').src = window.URL.createObjectURL(this.files[0]);">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Current Thumbnail Image</label><br>
                    <img src="{{ asset('noimage.png') }}" width="30%" alt="Current Thumbnail Image" class="preview">
                  </div>

                  <!-- Feature Image -->
                  <div class="col-12">
                    <label class="form-label" for="feature_image">Feature Image <small class="text-danger">Image Size: height:600px, width:600px</small></label>
                    <input type="file" class="form-control" name="feature_image" id="feature_image" onchange="document.querySelector('.preview1').src = window.URL.createObjectURL(this.files[0]);">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Current Feature Image</label><br>
                    <img src="{{ asset('noimage.png') }}" width="30%" alt="Current Feature Image" class="preview1">
                  </div>

                  <!-- Submit Button -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save & Publish</button>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
</main>

@endsection

@push('scripts')
<script>
  // Add Features Dynamically
  document.querySelector('.addFeatures').addEventListener('click', function() {
    let featureHTML = `
    <div class="row featureItem mb-2">
      <div class="col-10">
        <label class="form-label">Feature</label>
        <input type="text" name="service_feature[]" class="form-control" placeholder="Feature List">
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-danger btn-sm removeFeature" style="margin-top: 32px;"><i class="bi bi-trash"></i> Remove</button>
      </div>
    </div>
    `;
    document.querySelector('.featureDisplay').insertAdjacentHTML('beforeend', featureHTML);
  });

  // Remove Feature Dynamically
  document.querySelector('.featureDisplay').addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('removeFeature')) {
      e.target.closest('.featureItem').remove();
    }
  });
</script>

<script type="text/javascript">
  $('#storeService').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $(document).find("span.text-danger").remove();
    $.ajax({
      type: 'POST',
      url: "{{ route('service.store') }}",
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        if (response.status === 200) {
          toastr.success(response.msg);
          $('#storeService')[0].reset();
          $('.editor').summernote('reset');
        } else {
          toastr.error(response.msg);
        }
      },
      error: function(response) {
        $.each(response.responseJSON.errors, function(field_name, error) {
          $('[name="' + field_name + '"]').after('<span class="text-danger">' + error + '</span>');
        });
      }
    });
  });
</script>

@endpush
