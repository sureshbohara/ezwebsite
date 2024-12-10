<?php
use App\Models\Comments;
$todayComments = Comments::getRecords();
$todayCommentsCount = $todayComments->count();
?>

<header class="top-header">
  <nav class="navbar navbar-expand">
    <div class="mobile-toggle-icon d-xl-none">
      <i class="bi bi-list"></i>
    </div>

    <div class="top-navbar-right ms-3 ms-auto">
      <ul class="navbar-nav align-items-center">

        <!-- Dark Mode Toggle -->
        <li class="nav-item dropdown dropdown-large">
          <a id="darkModeButton" class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
            <div class="user-setting d-flex align-items-center gap-1">
              <img id="moonIcon" src="{{ asset('moon_light.png') }}" class="user-img" alt="Light Mode">
              <div class="user-name d-none d-sm-block">Light</div>
            </div>
          </a>
        </li>

        <!-- View Website Link -->
        <li class="nav-item dropdown dropdown-large">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{ url('/') }}" target="_blank">
            <div class="user-setting d-flex align-items-center gap-1">
              <img src="{{ asset('website.png') }}" class="user-img" alt="View Website">
              <div class="user-name d-none d-sm-block">View Website</div>
            </div>
          </a>
        </li>

        <!-- User Profile Dropdown -->
        <li class="nav-item dropdown dropdown-large">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
            <div class="user-setting d-flex align-items-center gap-1">
              <img src="{{ Auth::user()->imageUrl }}" class="user-img" alt="User Image">
              <div class="user-name d-none d-sm-block">{{ Auth::user()->name }}</div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <img src="{{ Auth::user()->imageUrl }}" alt="User Profile" class="rounded-circle" width="60" height="60">
                  <div class="ms-3">
                    <h6 class="mb-0 dropdown-user-name">{{ Auth::user()->name }}</h6>
                    <small class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->role->name }}</small>
                  </div>
                </div>
              </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <!-- Update Profile Link -->
            <li>
              <a class="dropdown-item" href="{{ route('update.profiles') }}">
                <div class="d-flex align-items-center">
                  <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                  <div class="setting-text ms-3"><span>Update Profile</span></div>
                </div>
              </a>
            </li>

            <!-- Change Password Link -->
            <li>
              <a class="dropdown-item" href="{{ route('update.password') }}">
                <div class="d-flex align-items-center">
                  <div class="setting-icon"><i class="bi bi-lock"></i></div>
                  <div class="setting-text ms-3"><span>Change Password</span></div>
                </div>
              </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <!-- Logout Link -->
            <li>
              <a class="dropdown-item" href="{{ route('admin.logout') }}">
                <div class="d-flex align-items-center">
                  <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                  <div class="setting-text ms-3"><span>Logout</span></div>
                </div>
              </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <!-- Account Delete Link -->
            <li>
              <a class="dropdown-item" href="{{ route('account.delete') }}">
                <div class="d-flex align-items-center">
                  <div class="setting-icon"><i class="bi bi-trash"></i></div>
                  <div class="setting-text ms-3"><span>Account Delete</span></div>
                </div>
              </a>
            </li>
          </ul>
        </li>

        <!-- Messages Dropdown -->
        <li class="nav-item dropdown dropdown-large">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
            <div class="messages">
              <span class="notify-badge">{{ $todayCommentsCount }}</span>
              <i class="bi bi-chat"></i>
            </div>
          </a>

          <!-- Today's Comments Dropdown -->
          <div class="dropdown-menu dropdown-menu-end p-0">
            <div class="p-2 border-bottom m-2">
              <h5 class="h5 mb-0">Today Notifications</h5>
            </div>

            <div class="header-message-list p-2">
              @foreach($todayComments as $comment)
                <a class="dropdown-item" href="#"  style="border:1px solid;margin-bottom: 3px;">
                  <div class="d-flex align-items-center">
                    <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user"><i class="bi bi-building"></i>  {{ $comment->businesses->owner_name }} 
                         <span class="float-end"> <i class="bi bi-person-circle"></i> {{ $comment->user->name }}</span>
                      </h6>
                      <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Remarks: {{ $comment->comments }} <br> 
                         Time : {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                      </small>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>

            <div class="p-2">
              <hr class="dropdown-divider">
              <a class="dropdown-item" href="{{ Auth::user()->role_id == 1 ? route('business.list') : route('business.index') }}">
                <div class="text-center">View All Notifications</div>
              </a>
            </div>
          </div>
        </li>

      </ul>
    </div>
  </nav>
</header>
