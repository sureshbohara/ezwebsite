@extends('layouts.backend.layout')

@section('title', 'System Users')
@section('main_title', 'User Permission')

@section('content')
<main class="page-content">
    @include('layouts.backend.breadcrumb') 
    @include('admin.permission.table')  
    @include('admin.permission.form') 
</main>
@endsection

@push('scripts')
<script>
  $('#storePermission').on('submit', function(e) {
   e.preventDefault();
   $('span.text-danger').remove();
   let formData = new FormData(this);
   $.ajax({
    type: 'POST',
    url: "{{ route('permission.store') }}",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
      toastr.success(response.msg);
      window.location.href = "{{ route('permission.index') }}";
    },
    error: function(response) {
      $.each(response.responseJSON.errors, function(field_name, error) {
        $('[name="' + field_name + '"]').after('<span class="text-strong text-danger">' + error + '</span>');
      });
    }
  });
 });
</script>
@endpush
