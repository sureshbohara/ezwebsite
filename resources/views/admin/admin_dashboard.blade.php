@extends('layouts.backend.layout')
@section('title', 'Dashboard')
@section('main_title', 'Admin Dashboard')
@section('content')
  <main class="page-content">
          @include('layouts.backend.breadcrumb')
          @include('include.admin.top_section')
          @include('include.admin.second_section')
</main>
@endsection