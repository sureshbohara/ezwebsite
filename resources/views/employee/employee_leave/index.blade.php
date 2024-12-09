@extends('layouts.backend.layout')

@section('title', 'Leave')
@section('main_title', 'Client Leave')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header bg-custom d-flex align-items-center justify-content-between">
        <h6 class="mb-0 text-light">Leave List</h6>

        <a class="mb-0 btn btn-default btn-sm" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#Leave" aria-controls="offcanvasRight">
         <i class="fa fa-plus-circle"></i> Create New Data
       </a>
       
      </div>
        @include('employee.employee_leave.form')
      <div class="card-body">
         <div class="row">
         
           @include('employee.employee_leave.table')
         </div>
      </div>
  </div>
</main>

@endsection

@push('scripts')

<script>
$(document).ready(function(){
$(document).on('change','#leave_purpose_id',function(){
var leave_purpose_id = $(this).val();
if(leave_purpose_id == '0'){
$('#add_purpose').show();
}else{
$('#add_purpose').hide();
}
});   
});
</script>

@endpush