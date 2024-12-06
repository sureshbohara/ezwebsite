@extends('layouts.backend.layout')

@section('title', 'Page')
@section('main_title', 'Page Update')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb')

  <div class="card">
    <div class="card-header py-3 bg-transparent">
      <div class="d-sm-flex align-items-center">
        <h5 class="mb-2 mb-sm-0">Update Page</h5>
        <div class="ms-auto">
          <a href="{{ route('page.index') }}" class="btn btn-primary text-light">View Page List</a>
        </div>
      </div>
    </div>

    <div class="card-body">
      <form id="updatePage" action="{{ route('page.update', $data->id) }}" method="post" enctype="multipart/form-data">@csrf
        @method('PUT')
        <div class="row g-3">
          <!-- Left Column -->
          <div class="col-12 col-lg-8">
            <div class="card shadow-none bg-light border h-100">
              <div class="card-body row g-3">

                <!-- Page Title -->
                <div class="col-12">
                  <label class="form-label" for="name">Page Name <span class="text-danger">*</span></label>
                  <input type="text" name="name"  class="form-control" value="{{ old('name', $data->name) }}">
                </div>

                <!-- Page Description -->
                <div class="col-12">
                  <label class="form-label" for="description"> Description</label>
                  <textarea name="description" class="form-control editor" placeholder="Page Description.." rows="4">{{ old('description', $data->description) }}</textarea>
                </div>

                <!-- Page List -->
                <div class="col-12 listDisplay">
                @if(is_array($data['page_list']) || is_object($data['page_list']))
                  @foreach($data->page_list as $pageList)
                    <div class="row featureItem mb-2">
                      <div class="col-10">
                        <label class="form-label">Feature</label>
                        <input type="text" name="page_list[]" class="form-control" value="{{ $pageList }}" placeholder="Page List">
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

                <div class="col-12">
                  <label class="form-label">
                    Page List
                    <span class="btn btn-custom addPageList" style="cursor: pointer;"><i class="bi bi-plus-circle"></i> Add Page List</span>
                  </label>
                </div>

                <!-- SEO Section -->
                <div class="col-12">
                  <h5>SEO Settings</h5>
                </div>

                <div class="col-12 mb-3">
                  <label class="form-label">SEO Keywords</label>
                  <input type="text" name="meta_keywords" class="form-control" placeholder="SEO Keywords" value="{{ old('meta_keywords', $data->meta_keywords) }}">
                  <small class="form-text text-muted">Separate keywords with a comma (,)</small>
                </div>

                <div class="col-12 mb-3">
                  <label class="form-label">SEO Description</label>
                  <textarea name="meta_description" class="form-control" rows="3" placeholder="SEO Description">{{ old('meta_description', $data->meta_description) }}</textarea>
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
                    <label class="form-label" for="excerpt">Excerpt <span class="text-danger">*</span></label>
                    <textarea name="excerpt" class="form-control" rows="3" placeholder="Content description..">{{ old('excerpt', $data->excerpt) }}</textarea>
                  </div>

                  <!-- Order Level -->
                  <div class="col-12">
                    <label class="form-label" for="order_level">Order Level <span class="text-danger">*</span></label>
                    <input name="order_level"  type="number" class="form-control" value="{{ old('order_level', $data->order_level) }}">
                  </div>

                  <!-- Thumbnail Image -->
                  <div class="col-12">
                    <label class="form-label" for="image">Thumbnail Image <small class="text-danger">Image Size: height:300px, width:300px</small></label>
                    <input type="file" class="form-control" name="image" onchange="document.querySelector('.preview').src = window.URL.createObjectURL(this.files[0]);">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Current Thumbnail Image</label><br>
                    <img src="{{ $data->imageUrl }}" width="30%" alt="Current Thumbnail Image" class="preview">
                  </div>

                  <!-- Display On -->
                  <div class="col-12">
                    <label class="form-label" for="display_on">Display ON <span class="text-danger">*</span></label>
                    <select name="display_on" id="display_on" class="form-control">
                      <option value="default" {{ $data->display_on == 'default' ? 'selected' : '' }}>Default</option>
                      <option value="Header" {{ $data->display_on == 'Header' ? 'selected' : '' }}>Header</option>
                      <option value="Footer" {{ $data->display_on == 'Footer' ? 'selected' : '' }}>Footer</option>
                    </select>
                  </div>

                  <!-- Template On -->
                  <div class="col-12">
                    <label class="form-label" for="template">Template <span class="text-danger">*</span></label>
                    <select name="template" class="form-control">
                      <option value="default" {{ old('template', $data->template) == 'default' ? 'selected' : '' }}>Default</option>
                      <option value="right-side-form" {{ old('template', $data->template) == 'right-side-form' ? 'selected' : '' }}>Right Side Form</option>
                      <option value="full-width-form" {{ old('template', $data->template) == 'full-width-form' ? 'selected' : '' }}> Full wWdth Form</option>
                      <option value="full-width" {{ old('template', $data->template) == 'full-width' ? 'selected' : '' }}>Full Width</option>
                      <option value="without-layout" {{ old('template', $data->template) == 'without-layout' ? 'selected' : '' }}>Without Layout</option>
                    </select>
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
  document.querySelector('.addPageList').addEventListener('click', function() {
    let featureHTML = `
    <div class="row featureItem mb-2">
      <div class="col-10">
        <label class="form-label">Feature</label>
        <input type="text" name="page_list[]" class="form-control" placeholder="Page List">
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-danger btn-sm removeList" style="margin-top: 32px;"><i class="bi bi-trash"></i> Remove</button>
      </div>
    </div>
    `;
    document.querySelector('.listDisplay').insertAdjacentHTML('beforeend', featureHTML);
  });

  // Remove Feature Dynamically
  document.querySelector('.listDisplay').addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('removeList')) {
      e.target.closest('.featureItem').remove();
    }
  });
</script>


<script type="text/javascript">
  $('#updatePage').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $(document).find("span.text-danger").remove();
    $.ajax({
      type: 'POST',
      url: "{{ route('page.update', $data->id) }}",  
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
        $.each(response.responseJSON.errors, function(field_name, error) {
          $('[name="' + field_name + '"]').after('<span class="text-danger">' + error + '</span>');
        });
      }
    });
  });
</script>
@endpush
