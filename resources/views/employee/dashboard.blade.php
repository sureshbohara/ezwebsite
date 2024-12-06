@extends('layouts.backend.layout')
@section('title', 'Dashboard')
@section('main_title', 'Employeer Dashboard')
@section('content')
  <main class="page-content">
         @include('layouts.backend.breadcrumb')
         @include('include.employee.top_section')
         @include('include.employee.second_section')
</main>
@endsection
