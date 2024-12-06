@extends('layouts.backend.layout')

@section('title', 'Menu')
@section('main_title', 'Menu Website')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 

   <div class="alert alert-danger" role="alert">
    <b> manage page is a cms page, manage service is a post type page, the url of both should be the same, with the url of the menu.</b>
   </div>
  <div class="card">
    <div class="card-header bg-custom d-flex align-items-center justify-content-between">
      <h6 class="mb-0 text-light">Menu List</h6>
      <a class="mb-0 btn btn-default btn-sm" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuForm" aria-controls="offcanvasRight">
        <i class="fa fa-plus-circle"></i> Create New Menu
      </a>
      @include('admin.menu.create') 
    </div>
    
    <div class="card-body">
      <div class="row">
        @include('admin.menu.table')   
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
        url: "{{ route('status.menu') }}",
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
            url: '{{ route("menu.orderlevel") }}',
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
$(document).ready(function() {
    $('.menu-type').change(function() {
        var menuTypeId = $(this).data('type-id');  // Get the menu ID
        var type = $(this).val();  // Get the selected value from the dropdown
        
        $.ajax({
            url: '{{ route("menu.type") }}',  // Use the correct route URL
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',   // CSRF token for security
                id: menuTypeId,                 // Pass the menu ID
                display_on: type                // Pass the selected display_on value
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Display On updated successfully!');  // Success message
                } else {
                    toastr.error('Failed to update Display On.');
                }
            },
            error: function(xhr) {
                console.error('Error: ' + xhr.statusText);
                toastr.error('Error updating Display On.');
            }
        });
    });
});

</script>


<script>
$(document).ready(function() {
    $('.cms-type').change(function() {
        var cmsTypeId = $(this).data('cms-id');
        var pageType = $(this).val(); 
        $.ajax({
            url: '{{ route("menu.type.cms") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: cmsTypeId,
                is_cms_page: pageType
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Display On updated successfully!');
                } else {
                    toastr.error('Failed to update Display On.');
                }
            },
            error: function(xhr) {
                console.error('Error: ' + xhr.statusText);
                toastr.error('Error updating Display On.');
            }
        });
    });
});

</script>

<script>
$('#displayOnSelect, #searchInput, #statusSelect').on('change', function() {
    $('#filterForm').submit();
});
</script>

@endpush
