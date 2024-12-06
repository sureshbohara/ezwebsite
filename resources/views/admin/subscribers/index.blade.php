@extends('layouts.backend.layout')

@section('title', 'Subscribers')
@section('main_title', 'Subscribers List')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
       <div class="card-header bg-custom d-flex align-items-center justify-content-between">
         <h6 class="mb-0 text-light">Subscribers List</h6>


         <a href="#" class="mb-0 text-light me-3 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#sendAllCustomerMail">
              Send Email
            </a>

      </div>
       @include('admin.subscribers.send_mail')
       <div class="card-body">
          <div class="row">
            @include('admin.subscribers.table')   
         </div>
      </div>
  </div>
</main>
@endsection

@push('scripts')
<script>
   $(document).ready(function() {
    $('input[type="checkbox"]').on('change', function() {
        var form = $(this).closest('form');
        form.submit();
    });
});
</script>
@endpush
