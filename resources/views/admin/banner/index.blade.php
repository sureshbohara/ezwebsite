@extends('layouts.backend.layout')
@section('title', 'Banner')
@section('main_title', 'Banner Website')
@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header bg-custom d-flex align-items-center justify-content-between">
        <h6 class="mb-0 text-light">Banner List</h6>
        <a class="mb-0 btn btn-default btn-sm" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#banner" aria-controls="offcanvasRight">
         <i class="fa fa-plus-circle"></i> Create New Banner
       </a>
        @include('admin.banner.create') 
      </div>
      <div class="card-body">
         <div class="row">
           @include('admin.banner.table')   
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
        url: "{{ route('status.banner') }}",
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

@endpush