@extends('layouts.backend.layout')

@section('title', 'Plans')
@section('main_title', 'Pricing Plans')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
    <div class="card-header bg-custom d-flex align-items-center justify-content-between">
      <h6 class="mb-0 text-light">Pricing Plans List</h6>
      <a class="mb-0 btn btn-default btn-sm" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#plans" aria-controls="offcanvasRight">
        <i class="fa fa-plus-circle"></i> Create New Pricing Plans
      </a>
      @include('admin.plans.form') 
    </div>
    
    <div class="card-body">
      <div class="row">
        @include('admin.plans.table')   
      </div>
    </div>
  </div>
</main>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('input[type="checkbox"]').on('change', function() {
      var checkbox = $(this);
      var statusId = checkbox.closest('form').find('input[name="status_id"]').val();
      checkbox.prop('disabled', true);
      $.ajax({
        url: "{{ route('status.package') }}",
        method: "POST",
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          status_id: statusId,
        },
        success: function(response) {
          checkbox.prop('disabled', false);
          if (response.status === 200) {
            toastr.success(response.msg);
          } else {
            toastr.error(response.msg || 'Failed to update status');
          }
        },
        error: function(xhr, status, error) {
          checkbox.prop('disabled', false);
          toastr.error('An error occurred while updating the status');
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.order-level-input').on('change', function() {
      var input = $(this);
      var reviewId = input.data('id');
      var value = input.val();
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: '{{ route("package.orderlevel") }}',
        type: 'POST',
        data: {
          _token: csrfToken,
          id: reviewId,
          order_level: value
        },
        success: function(response) {
          if (response.success) {
            toastr.success('Order level updated successfully!');
          } else {
            toastr.error('Failed to update order level.');
          }
        },
        error: function(xhr) {
          console.error('Error: ' + xhr.statusText);
          toastr.error('Error updating order level.');
        }
      });
    });
  });
</script>

<script>
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

  // Remove Features Dynamically
  document.querySelector('.plansDisplay').addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('removeList')) {
      e.target.closest('.featureItem').remove();
    }
  });

  </script>






@endpush
