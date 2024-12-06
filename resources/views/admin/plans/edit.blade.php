@extends('layouts.backend.layout')

@section('title', 'Plans')
@section('main_title', 'Plans Update')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb')

  <div class="card">
    <div class="card-header py-3 bg-transparent">
      <div class="d-sm-flex align-items-center">
        <h5 class="mb-2 mb-sm-0">Update Plans</h5>
        <div class="ms-auto">
          <a href="{{ route('package.index') }}" class="btn btn-primary text-light">View Plans List</a>
        </div>
      </div>
    </div>

    <div class="card-body">
      <form id="updatePlans" method="post" enctype="multipart/form-data" action="{{ route('package.update', $plans->id) }}">@csrf
        @method('PUT')
        <div class="row g-3">
          <!-- Left Column -->
          <div class="col-12 col-lg-8">
            <div class="card shadow-none bg-light border h-100">
              <div class="card-body row g-3">
                <div class="col-12">
                  <label class="form-label">Plans Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $plans->name) }}">
                </div>

                <div class="col-12">
                  <label class="form-label">Plans Price <span class="text-danger">*</span></label>
                  <input type="text" name="price" class="form-control" value="{{ old('price', $plans->price) }}">
                </div>

                <div class="col-12 plansDisplay">
                  @if(is_array($plans['package_feature']) || is_object($plans['package_feature']))
                  @foreach($plans->package_feature as $pageList)
                  <div class="row featureItem mb-2">
                    <div class="col-10">
                      <label class="form-label">Feature List</label>
                      <input type="text" name="package_feature[]" class="form-control" value="{{ $pageList }}" placeholder="Feature List">
                    </div>
                    <div class="col-2">
                      <button type="button" class="btn btn-danger btn-sm removeList" style="margin-top: 32px;">
                        <i class="bi bi-trash"></i> Remove
                      </button>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>

                <div class="col-12 mt-3">
                  <label class="form-label">
                    Plans Service
                    <span class="btn btn-custom addMore" style="cursor: pointer;">
                      <i class="bi bi-plus-circle"></i> Add Service
                    </span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Right Column -->
          <div class="col-12 col-lg-4">
            <div class="card shadow-none bg-light border h-100">
              <div class="card-body">
                <div class="row g-3">

                  <div class="col-12">
                    <label class="form-label" for="excerpt">Additional Features <span class="text-danger">*</span></label>
                    <textarea name="excerpt" class="form-control" rows="5" placeholder="Content description..">{{ old('excerpt', $plans->excerpt) }}</textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label" for="order_level">Order Level <span class="text-danger">*</span></label>
                    <input name="order_level" type="number" class="form-control" value="{{ old('order_level', $plans->order_level) }}">
                  </div>

                   <div class="mb-3 col-md-12">
                    <label for="bg_color" class="form-label">Bg Color<span class="text-danger">*</span></label>
                     <input type="color" name="bg_color" class="form-control" value="{{ old('bg_color', $plans->bg_color) }}">
                    </div>


                  <div class="mb-3 col-md-12">
                    <label for="display_on" class="form-label">Categories Type<span class="text-danger">*</span></label>
                    <select name="display_on" id="display_on" class="form-control" required>
                      <option value="Shared Hosting" {{ $plans->display_on == 'Shared Hosting' ? 'selected' : '' }}>Shared Hosting</option>
                      <option value="Magento Extensions" {{ $plans->display_on == 'Magento Extensions' ? 'selected' : '' }}>Magento Extensions</option>
                      <option value="SSL Certificates" {{ $plans->display_on == 'SSL Certificates' ? 'selected' : '' }}>SSL Certificates</option>
                      <option value="Website Security" {{ $plans->display_on == 'Website Security' ? 'selected' : '' }}>Website Security</option>
                      <option value="Website Builder" {{ $plans->display_on == 'Website Builder' ? 'selected' : '' }}>Website Builder</option>
                      <option value="Register a New Domain" {{ $plans->display_on == 'Register a New Domain' ? 'selected' : '' }}>Register a New Domain</option>
                      <option value="Transfer Domain" {{ $plans->display_on == 'Transfer Domain' ? 'selected' : '' }}>Transfer Domain</option>
                    </select>
                  </div>

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
  // Add new feature input dynamically
  document.querySelector('.addMore').addEventListener('click', function() {
    let featureHTML = `
    <div class="row featureItem mb-2">
      <div class="col-10">
        <label class="form-label">Feature List</label>
        <input type="text" name="package_feature[]" class="form-control" placeholder="Feature List">
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-danger btn-sm removeList" style="margin-top: 32px;">
          <i class="bi bi-trash"></i> Remove
        </button>
      </div>
    </div>
    `;
    document.querySelector('.plansDisplay').insertAdjacentHTML('beforeend', featureHTML);
  });

  // Remove a feature input dynamically
  document.querySelector('.plansDisplay').addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('removeList')) {
      e.target.closest('.featureItem').remove();
    }
  });
</script>

<script type="text/javascript">
  $('#updatePlans').submit(function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    $(document).find("span.text-danger").remove(); 

    $.ajax({
      type: 'POST',
      url: "{{ route('package.update', $plans->id) }}",
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        if (response.status === 200) {
          toastr.success(response.msg);
        } else {
          toastr.error(response.msg);
        }
      },
      error: function(response) {
        // Handle validation errors and display them
        $.each(response.responseJSON.errors, function(field_name, error) {
          $('[name="' + field_name + '"]').after('<span class="text-danger">' + error + '</span>');
        });
      }
    });
  });
</script>

@endpush
