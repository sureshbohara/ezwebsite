@extends('layouts.backend.layout')

@section('title', 'System Users')
@section('main_title', 'User List')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 

  <div class="card">
    <div class="card-header bg-custom d-flex align-items-center justify-content-between">
     <h6 class="mb-0 text-light">System Users List</h6>
     <a href="#" class="mb-0 btn btn-default btn-sm" data-bs-toggle="offcanvas" data-bs-target="#users" aria-controls="offcanvasRight">
       Create New Data
     </a>
   </div>
   @include('admin.users.form') 
   <div class="card-body">
     <div class="row">
       @include('admin.users.table')   
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
        url: "{{ route('status.users') }}",
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
