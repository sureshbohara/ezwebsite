@extends('layouts.backend.layout')

@section('title', 'Business')
@section('main_title', 'Client List')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header bg-custom d-flex align-items-center justify-content-between">
        <h6 class="mb-0 text-light">Client List</h6>
          <a class="mb-0 btn btn-default btn-sm" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#client" aria-controls="offcanvasRight">
           <i class="fa fa-plus-circle"></i> Create New Data
         </a>
        @include('employee.business.form') 
      </div>
      <div class="card-body">
         <div class="row">
           @include('employee.business.table')   
         </div>
      </div>
  </div>
</main>

@endsection
@push('scripts')
<script>
$('#businessType, #searchInput, #businessStatus').on('change', function() {
    $('#filterForm').submit();
});
</script>

<script>
  $(document).ready(function() {
    $('.business_status').change(function() {
        var pageTypeId = $(this).data('status-id'); 
        var pageType = $(this).val(); 

        $.ajax({
            url: '{{ route("business.status.type") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: pageTypeId, 
                business_status: pageType 
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Business status updated successfully!');
                } else {
                    toastr.error('Failed to update business status.');
                }
            },
            error: function(xhr) {
                console.error('Error: ' + xhr.statusText);
                toastr.error('Error updating business status.');
            }
        });
    });
});
</script>



@endpush
