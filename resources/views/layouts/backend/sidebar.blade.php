<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <!-- Logo -->
      <img src="{{ $setting->logo ? asset('images/'.$setting->logo) : asset('noimage.png') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
      <!-- System Name -->
      <h4 class="logo-text">{{ $setting->system_name }}</h4>
    </div>
    <div class="toggle-icon ms-auto">
      <i class="bi bi-chevron-double-left"></i>
    </div>
  </div>

  <ul class="metismenu" id="menu">

    <!-- Role-based Sidebar Menu Inclusion -->
    @if(Auth::user()->role_id == 1)
      <!-- Admin Dashboard Link -->
      <li>
        <a href="{{ route('admin.dashboard') }}">
          <div class="parent-icon"><i class="bi bi-speedometer2"></i></div>
          <div class="menu-title">Main Dashboard</div>
        </a>
      </li>
      <!-- Include Admin Sidebar Menu -->
      @include('layouts.backend.admin_sidebar')

    @elseif(Auth::user()->role_id == 2)
      <!-- Employee Dashboard Link -->
      <li>
        <a href="{{ route('employee.dashboard') }}">
          <div class="parent-icon"><i class="bi bi-speedometer2"></i></div>
          <div class="menu-title">Employee Dashboard</div>
        </a>
      </li>
      <!-- Include Employee Sidebar Menu -->
      @include('employee.sidebar')

    @elseif(Auth::user()->role_id == 3)
      <!-- Customer Dashboard Link -->
      <li>
        <a href="{{ route('customer.dashboard') }}">
          <div class="parent-icon"><i class="bi bi-speedometer2"></i></div>
          <div class="menu-title">Customer Dashboard</div>
        </a>
      </li>
      <!-- Include Customer Sidebar Menu -->
      @include('customer.sidebar')

    @endif

  </ul>
</aside>
