@extends('layouts.backend.layout')

@section('title', 'Business')
@section('main_title', 'Client List')

@section('content')
<main class="page-content">
  @include('layouts.backend.breadcrumb') 
  <div class="card">
      <div class="card-header bg-custom d-flex align-items-center justify-content-between">
        <h6 class="mb-0 text-light">Client List</h6>
      </div>
      <div class="card-body">
         <div class="row">
           @include('admin.business_table')   
         </div>
      </div>
  </div>
</main>

@endsection
