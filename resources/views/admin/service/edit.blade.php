@extends('layouts.backend.layout')

@section('title', 'Service')
@section('main_title', 'Service Update')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 

  <div class="card">
    <div class="card-header py-3 bg-transparent">
      <div class="d-sm-flex align-items-center">
        <h5 class="mb-2 mb-sm-0">Update Service</h5>
        <div class="ms-auto">
          <a href="{{ route('service.index') }}" class="btn btn-primary text-light">View Service List</a>
        </div>
      </div>
    </div>

    <div class="card-body">
      <form id="updateService" action="{{ route('service.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
          <!-- Left Column -->
          <div class="col-12 col-lg-8">
            <div class="card shadow-none bg-light border h-100">
              <div class="card-body row g-3">

                <!-- Service Title -->
                <div class="col-12">
                  <label class="form-label" for="service_title">Service Title <span class="text-danger">*</span></label>
                  <input type="text" name="service_title" class="form-control" value="{{ $data['service_title'] }}">
                </div>

                <!-- Service Sub Title -->
                <div class="col-12">
                  <label class="form-label" for="service_sub_title">Font Icon</label>
                  <input type="text" name="service_sub_title" class="form-control" placeholder="Font Icon:fa-gear" value="{{ $data['service_sub_title'] }}">
                </div>

                <!-- Service Description -->
                <div class="col-12">
                  <label class="form-label" for="description">Service Description</label>
                  <textarea name="description" class="form-control editor" placeholder="Service Description.." rows="4">{!! $data['description'] !!}</textarea>
                </div>

             

                <!-- Service Features -->
                <div class="col-12 featureDisplay">
                @if(is_array($data['service_feature']) || is_object($data['service_feature']))
                  @foreach($data->service_feature as $feature)
                    <div class="row featureItem mb-2">
                      <div class="col-10">
                        <label class="form-label">Feature List</label>
                        <input type="text" name="service_feature[]" class="form-control" value="{{ $feature }}">
                      </div>
                      <div class="col-2">
                        <button type="button" class="btn btn-danger btn-sm removeFeature" style="margin-top: 32px;">
                          <i class="bi bi-trash"></i> Remove
                        </button>
                      </div>
                    </div>
                  @endforeach
                  @endif
                </div>
                <div class="col-12">
                  <label class="form-label">
                    Service Features
                    <span class="btn btn-custom addFeatures" style="cursor: pointer;"><i class="bi bi-plus-circle"></i> Add Features</span>
                  </label>
                </div>

                <!-- SEO Section -->
                <div class="col-12">
                  <h5>SEO Settings</h5>
                </div>

                <div class="col-12 mb-3">
                  <label  class="form-label">SEO Keywords</label>
                  <input type="text" name="meta_keywords" class="form-control" value="{{ $data['meta_keywords'] }}">
                  <small class="form-text text-muted">Separate keywords with a comma (,)</small>
                </div>

                <div class="col-12 mb-3">
                  <label  class="form-label">SEO Description</label>
                  <textarea name="meta_description" class="form-control" rows="3" placeholder="SEO Description">{{ $data['meta_description'] }}</textarea>
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
                    <textarea name="excerpt" class="form-control" rows="3" placeholder="Content description..">{{ $data['excerpt'] }}</textarea>
                  </div>

                  <!-- Order Level -->
                  <div class="col-12">
                    <label class="form-label" for="order_level">Order Level <span class="text-danger">*</span></label>
                    <input name="order_level" type="number" class="form-control" value="{{ $data['order_level'] }}">
                  </div>

                  <!-- Display On -->
                  <div class="col-12">
                    <label class="form-label" for="display_on">Post Type <span class="text-danger">*</span></label>
                    <select name="display_on" class="form-control">
                      <option value="SERVICES" {{ $data['display_on'] == 'SERVICES' ? 'selected' : '' }}>SERVICES</option>
                      <option value="PROCESS" {{ $data['display_on'] == 'PROCESS' ? 'selected' : '' }}>PROCESS</option>
                    </select>
                  </div>

                  <!-- Thumbnail Image -->
                  <div class="col-12">
                    <label class="form-label" for="image">Thumbnail Image <small class="text-danger">Image Size: height:300px, width:300px</small></label>
                    <input type="file" class="form-control" name="image" id="image" onchange="document.querySelector('.preview').src = window.URL.createObjectURL(this.files[0]);">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Current Thumbnail Image</label><br>
                    <img src="{{ $data['imageUrl'] }}" width="30%" alt="Current Thumbnail Image" class="preview">
                  </div>

                  <!-- Feature Image -->
                  <div class="col-12">
                    <label class="form-label" for="feature_image">Feature Image <small class="text-danger">Image Size: height:600px, width:600px</small></label>
                    <input type="file" class="form-control" name="feature_image" id="feature_image" onchange="document.querySelector('.preview1').src = window.URL.createObjectURL(this.files[0]);">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Current Feature Image</label><br>
                    <img src="{{ $data['feature_url '] }}" width="30%" alt="Current Feature Image" class="preview1">
                  </div>

                  <!-- Submit Button -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save & Update</button>
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
  $('#updateService').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $(document).find("span.text-danger").remove();
    $.ajax({
      type: 'POST',
      url: "{{ route('service.update', $data->id) }}",  
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        if (response.status === 200) {
          toastr.success(response.msg);
          $('#updateService')[0].reset();
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
